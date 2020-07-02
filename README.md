# Example Using Vue.js in CodeIgniter 4 application

Introduction
------------

A CodeIgniter 4 Skeleton Application with Vue.js integration.

Features
--------

- SPA application with Vue Router with cached pages after visited.
- Using server side template from CodeIgniter 4, compiled with `Vue.compile()` in Vue.js component's `render()`.
- Using Vuex for state management library, combo with sessionStorage on portfolio page.

## Setup

*1.* Run composer create-project command:

```bash
$ composer create-project -sdev samsonasik/ci4-vue
```

*2.* Setup environment

Set CI_ENVIRONMENT, base url, index page in your .env file (If you don't have a .env file, you can copy first from env file: cp env .env first):

```bash
# file .env
CI_ENVIRONMENT = development

app.baseURL    = 'http://localhost:8080'
app.indexPage  = ''
```

*3.* Run PHP Development server

```php
$ cd ci4-vue
$ php spark serve
```

*3.* Open web browser http://localhost:8080

## Production

For deploy to production purpose, it has `webpack.config.js` in root directory that when we run `webpack` command, we can get `public/js/dist/bundle.js` after run it. If you don't have a `webpack` installed yet in your system, you can install nodejs and install `webpack` and `webpack-cli`:

```bash
$ sudo npm install -g webpack
$ sudo npm install -g webpack-cli
```

So, we can run:

```bash
$ webpack

Hash: 8e63a0daee1be975aeb3
Version: webpack 4.43.0
Time: 469ms
Built at: 07/02/2020 6:13:41 PM
                   Asset     Size  Chunks             Chunk Names
public/js/dist/bundle.js  2.7 KiB       0  [emitted]  main
Entrypoint main = public/js/dist/bundle.js
[0] ./public/js/app.js + 4 modules 3.85 KiB {0} [built]
    | ./public/js/app.js 772 bytes [built]
    | ./public/js/create-page.js 924 bytes [built]
    | ./public/js/portfolio.js 1.67 KiB [built]
    | ./public/js/store.js 183 bytes [built]
    | ./public/js/portfolio-store-module.js 353 bytes [built]
```

After it generated, we can update `.env` file as follow:

```bash
# file .env
CI_ENVIRONMENT = production

app.baseURL    = 'https://www.your-website.com'
app.indexPage  = ''
```

In `app/Views/layout.php`, we have a `ENVIRONMENT` check to use `js/app.js` when on development, and use `/js/dist/bundle.js` on production when exists.

```php
// src/App/templates/layout/default.phtml
<?php $isDevelopment = ENVIRONMENT === 'development'; ?>

// ...
    <script src="<?php echo $isDevelopment
            ? '/js/app.js'
            : (
                // when after run webpack, allow to use bundled js
                // fallback to use /js/app.js when not
                file_exists(ROOTPATH . 'public/js/dist/bundle.js')
                    ? '/js/dist/bundle.js'
                    : '/js/app.js'
            ); ?>" type="module"></script>
// ...
```

that will automatically take care of that.