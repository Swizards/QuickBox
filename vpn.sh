OPENVPNPORT1=$((RANDOM%64025+1024))
IPADDRESS1=$(ifconfig | sed -n 's/.*inet addr:\([0-9.]\+\)\s.*/\1/p' | grep -v 127 | head -n 1)
HOSTNAME=$(hostname)
IP1=$(wget -qO- ipv4.icanhazip.com)

newusername () {
cp /usr/share/doc/openvpn/examples/sample-config-files/client.conf ~/$1.ovpn
sed -i "/ca ca.crt/d" ~/$1.ovpn
sed -i "/cert username.crt/d" ~/$1.ovpn
sed -i "/key username.key/d" ~/$1.ovpn
echo "<ca>" >> ~/$1.ovpn; cat /etc/openvpn/easy-rsa/2.0/keys/ca.crt >> ~/$1.ovpn
echo "</ca>" >> ~/$1.ovpn
echo "<cert>" >> ~/$1.ovpn; cat /etc/openvpn/easy-rsa/2.0/keys/$1.crt >> ~/$1.ovpn
echo "</cert>" >> ~/$1.ovpn
echo "<key>" >> ~/$1.ovpn; cat /etc/openvpn/easy-rsa/2.0/keys/$1.key >> ~/$1.ovpn
echo "</key>" >> ~/$1.ovpn
}

IP=$(ifconfig | grep 'inet addr:' | grep -v inet6 | grep -vE '127\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | cut -d: -f2 | awk '{ print $1}' | head -1)
if [[ "$IP" = "" ]]; then IP=$(wget -qO- ipv4.icanhazip.com) ;fi
if [[ -e /etc/openvpn/server.conf ]]; then 
	while : ;do
clear
echo "Looks like OpenVPN is already installed"
echo "What do you want to do?"
echo ""
echo "1) Add a cert for a new user"
echo "2) Revoke existing user cert"
echo "3) Remove OpenVPN"
echo "4) Exit"
echo ""
read -p "Select an option [1-4]: " option
case $option in
		1)
			echo ""
			echo "Tell me a name for the username cert"
			echo -n "username name: " ; read username
			adduser --system --disabled-login ${username}
			mkdir -p /home/${username}/public_html
			chown ${username}.${username} /home/${username}/public_html
			cd /etc/openvpn/easy-rsa/2.0/
			source ./vars

			export KEY_CN="$username"
			export EASY_RSA="${EASY_RSA:-.}"

			"$EASY_RSA/pkitool" $username

			newusername "$username"

			echo ""
			echo "$username.ovpn is zipped into $username.zip"
			echo "$username added, cert available at http://$IP/~${username}/$username.zip to use in any OpenVPN username"
			zip /home/${username}/public_html/$username.zip /root/$username.ovpn
cat >/home/${username}/public_html/.htaccess<<EOF
Options -Indexes
EOF
service openvpn restart
			exit
		;;
		2)
			echo ""
			echo "Tell me the existing username name"
			read -p "username name: " -e -i username username
			cd /etc/openvpn/easy-rsa/2.0/
			. /etc/openvpn/easy-rsa/2.0/vars
			. /etc/openvpn/easy-rsa/2.0/revoke-full $username
			if grep -q "crl-verify" "/etc/openvpn/server.conf"; then
			echo ""
			echo "Certificate for username $username revoked"
			else
			echo "crl-verify /etc/openvpn/easy-rsa/2.0/keys/crl.pem" >> "/etc/openvpn/server.conf"
			/etc/init.d/openvpn restart
			echo ""
			echo "Certificate for username $username revoked"
			fi
			userdel -rf ${username}
			exit
		;;
		3)
			echo ""
			read -p "Do you really want to remove OpenVPN? [y/n]: " -e -i n REMOVE
			if [[ "$REMOVE" = 'y' ]]; then
			apt-get remove --purge -y openvpn openvpn-blacklist
			rm -rf /etc/openvpn; 	rm -rf /usr/share/doc/openvpn
			sed -i '/--dport 53 -j REDIRECT --to-port/d' /etc/rc.local
			sed -i '/iptables -t nat -A POSTROUTING -s 10.8.0.0/d' /etc/rc.local
			echo ""
			echo "OpenVPN removed!"
			fi
			exit
		;;
		4) exit;;
esac
done
else
clear
a2enmod userdir >/dev/null 2>&1
cat >>/etc/apache2/apache2.conf<<'APA'
UserDir public_html
<Directory /home/*/public_html/>
Options -Indexes
AllowOverride All
</Directory>
APA
cat >/etc/rc.local<<ipt
iptables -A FORWARD -m state --state RELATED,ESTABLISHED -j ACCEPT
iptables -A FORWARD -s 10.8.0.0/24 -j ACCEPT
iptables -A FORWARD -j REJECT
iptables -t nat -A POSTROUTING -s 10.8.0.0/24 -o venet0 -j SNAT --to-source $IP
ipt
echo ""
echo ""
read -p "IP address: " -e -i $IP1 IP
echo ""
echo "What port do you want for OpenVPN?"
read -p "Port: " -e -i $OPENVPNPORT1 PORT
echo ""
echo "Do you want OpenVPN to be available at port 53 too?"
echo "This can be useful to connect under restrictive networks"
read -p "Listen at port 53 [y/n]: " -e -i n ALTPORT
echo ""
echo "Do you want to enable internal networking for the VPN?"
echo "This can allow VPN usernames to communicate between them"
read -p "Allow internal networking [y/n]: " -e -i n INTERNALNETWORK
echo ""
echo "What DNS do you want to use with the VPN?"
echo " 1) Current system resolvers"
echo " 2) OpenDNS"
echo " 3) Level 3"
echo " 4) NTT"
echo " 5) Hurricane Electric"
echo " 6) Yandex"
read -p "DNS [1-6]: " -e -i 1 DNS
echo ""
echo "Finally, tell me your name for the username cert"
echo "Please, use one word only, no special characters"
echo -n "username name: " ;read username
echo ""
echo "Okay, that was all I needed. We are ready to setup your OpenVPN server now"
read -n1 -r -p "Press any key to continue..."
			adduser --system --disabled-login ${username}
			mkdir -p /home/${username}/public_html
			chown ${username}.${username} /home/${username}/public_html >/dev/null 2>&1
apt-get update >/dev/null 2>&1; apt-get install openvpn iptables zip openssl -y >/dev/null 2>&1
cp -R /usr/share/doc/openvpn/examples/easy-rsa/ /etc/openvpn >/dev/null 2>&1
if [[ ! -d /etc/openvpn/easy-rsa/2.0/ ]]; then
	wget -q --no-check-certificate -O ~/easy-rsa.tar.gz https://github.com/OpenVPN/easy-rsa/archive/2.2.2.tar.gz
	tar xzf ~/easy-rsa.tar.gz -C ~/; mkdir -p /etc/openvpn/easy-rsa/2.0/
	cp ~/easy-rsa-2.2.2/easy-rsa/2.0/* /etc/openvpn/easy-rsa/2.0/
	rm -rf ~/easy-rsa-2.2.2; rm -rf ~/easy-rsa.tar.gz
fi
cd /etc/openvpn/easy-rsa/2.0/
cp -u -p openssl-1.0.0.cnf openssl.cnf
sed -i 's|export KEY_SIZE=1024|export KEY_SIZE=2048|' /etc/openvpn/easy-rsa/2.0/vars
. /etc/openvpn/easy-rsa/2.0/vars
. /etc/openvpn/easy-rsa/2.0/clean-all
export EASY_RSA="${EASY_RSA:-.}"
"$EASY_RSA/pkitool" --initca $*

export EASY_RSA="${EASY_RSA:-.}"
"$EASY_RSA/pkitool" --server server

export KEY_CN="$username"
export EASY_RSA="${EASY_RSA:-.}"
"$EASY_RSA/pkitool" $username; . /etc/openvpn/easy-rsa/2.0/build-dh

cd /usr/share/doc/openvpn/examples/sample-config-files
gunzip -d server.conf.gz
cp server.conf /etc/openvpn/
cd /etc/openvpn/easy-rsa/2.0/keys
cp ca.crt ca.key dh2048.pem server.crt server.key /etc/openvpn
cd /etc/openvpn/
# Set the server configuration
sed -i 's|dh dh1024.pem|dh dh2048.pem|' server.conf
sed -i 's|;push "redirect-gateway def1 bypass-dhcp"|push "redirect-gateway def1 bypass-dhcp"|' server.conf
sed -i "s|port 1194|port $PORT|" server.conf
# DNS
case $DNS in
		1)
			grep -v '#' /etc/resolv.conf | grep 'nameserver' | grep -E -o '[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | while read line; do
			sed -i "/;push \"dhcp-option DNS 208.67.220.220\"/a\push \"dhcp-option DNS $line\"" server.conf
			done
		;;
		2)
			sed -i 's|;push "dhcp-option DNS 208.67.222.222"|push "dhcp-option DNS 208.67.222.222"|' server.conf
			sed -i 's|;push "dhcp-option DNS 208.67.220.220"|push "dhcp-option DNS 208.67.220.220"|' server.conf
		;;
		3)
			sed -i 's|;push "dhcp-option DNS 208.67.222.222"|push "dhcp-option DNS 4.2.2.2"|' server.conf
			sed -i 's|;push "dhcp-option DNS 208.67.220.220"|push "dhcp-option DNS 4.2.2.4"|' server.conf
		;;
		4)
			sed -i 's|;push "dhcp-option DNS 208.67.222.222"|push "dhcp-option DNS 129.250.35.250"|' server.conf
			sed -i 's|;push "dhcp-option DNS 208.67.220.220"|push "dhcp-option DNS 129.250.35.251"|' server.conf
		;;
		5)
			sed -i 's|;push "dhcp-option DNS 208.67.222.222"|push "dhcp-option DNS 74.82.42.42"|' server.conf
		;;
		6)
			sed -i 's|;push "dhcp-option DNS 208.67.222.222"|push "dhcp-option DNS 77.88.8.8"|' server.conf
			sed -i 's|;push "dhcp-option DNS 208.67.220.220"|push "dhcp-option DNS 77.88.8.1"|' server.conf
		;;
esac
if [[ "$ALTPORT" = 'y' ]]; then iptables -t nat -A PREROUTING -p udp -d $IP --dport 53 -j REDIRECT --to-port $PORT; sed -i "1 a\iptables -t nat -A PREROUTING -p udp -d $IP --dport 53 -j REDIRECT --to-port $PORT" /etc/rc.local; fi
sed -i 's|#net.ipv4.ip_forward=1|net.ipv4.ip_forward=1|' /etc/sysctl.conf; echo 1 > /proc/sys/net/ipv4/ip_forward
if [[ "$INTERNALNETWORK" = 'y' ]]; then 
	iptables -t nat -A POSTROUTING -s 10.8.0.0/24 ! -d 10.8.0.0/24 -j SNAT --to $IP; sed -i "1 a\iptables -t nat -A POSTROUTING -s 10.8.0.0/24 ! -d 10.8.0.0/24 -j SNAT --to $IP" /etc/rc.local
else
	iptables -t nat -A POSTROUTING -s 10.8.0.0/24 -j SNAT --to $IP; sed -i "1 a\iptables -t nat -A POSTROUTING -s 10.8.0.0/24 -j SNAT --to $IP" /etc/rc.local
fi
/etc/init.d/openvpn restart
/etc/init.d/apache2 restart
# Try to detect a NATed connection and ask about it to potential LowEndSpirit
# users
EXTERNALIP=$(wget -qO- ipv4.icanhazip.com)
if [[ "$IP" != "$EXTERNALIP" ]]; then
	echo ""
	echo "Looks like your server is behind a NAT!"
	echo ""
	echo "If your server is NATed (LowEndSpirit), I need to know the external IP"
	echo "If that's not the case, just ignore this and leave the next field blank"
	read -p "External IP: " -e USEREXTERNALIP
	if [[ "$USEREXTERNALIP" != "" ]]; then IP=$USEREXTERNALIP; fi
fi

sed -i "s|remote my-server-1 1194|remote $IP $PORT|" /usr/share/doc/openvpn/examples/sample-config-files/client.conf
newusername "$username"
echo ""
echo "Finished!"
echo ""
echo "$username.ovpn is zipped into $username.zip"
echo "$username added, cert available at http://$IP/~${username}/$username.zip to use in any OpenVPN username"
echo ""
echo "If you want to add more usernames, you simply need to run this script another time!"
zip /home/${username}/public_html/$username.zip /root/$username.ovpn
cat >/home/${username}/public_html/.htaccess<<EOF
Options -Indexes
EOF
fi

