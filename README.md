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