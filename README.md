

### For a full README and CHANGELOG
> For a full README and CHANGELOG on QuickBox as well as how to install, please visit the [QuickBox Plaza](https://plaza.quickbox.io/t/quickbox-readme-md/31)

## Script status

[![Version 2.1.1-production](https://img.shields.io/badge/version-2.1.1-674172.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)

---

###Quick Advisory Notice on Swizards/QuickBox/v211
---
> This is an archive branch for the QuickBox install script. You may install this version, but please note... support has ended for versions previous to v2.3.0. If you are running QuickBox versions less than v2.3.0 we advise that you update immediately. The update process can be found here.


---
### Ubuntu 16.04

**Run the following command to grab the latest stable release [Ubunut 16.04 w/ PHP 7 - standalone] ...**
```
apt -yqq update && apt -yqq upgrade && apt -yqq install git curl lsb-release; \
git clone -b qb_u_1604 https://github.com/Swizards/QuickBox.git /root/tmp/QuickBox/; \
cd /root/tmp/QuickBox*; \
bash quickbox.sh

```

### To run this version for install

```
apt-get -yqq update; apt-get -yqq upgrade; apt-get -yqq install git curl lsb-release; \
git clone -b v211 https://github.com/Swizards/QuickBox.git /root/tmp/QuickBox/; \
cd /root/tmp/QuickBox*; \
bash quickbox.sh


```
