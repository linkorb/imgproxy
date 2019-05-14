# imgproxy
ImgproxyService use imgproxy, is a fast and secure standalone server for resizing and converting remote images.
The main principles of imgproxy are simplicity, speed, and security.

**[imgproxy document](https://github.com/imgproxy/imgproxy#documentation)** for more detials.

## Installation
 ```bash
   composer require linkorb/imgproxy
 ```


## Setup

1. composer install
1. copy env.dist to .env file.
1. setting in .env file.

## Generate credentials
If you need a random key/salt pair real fast, you can quickly generate it using, for example, the following snippet

```bash
$ echo $(xxd -g 2 -l 64 -p /dev/random | tr -d '\n')
```

## configure presets
   more detail check [persets](https://github.com/imgproxy/imgproxy/blob/master/docs/presets.md)

### example
   Find sample in  /examples folder.

