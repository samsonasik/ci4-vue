<html>
  <head>
    <style type="text/css">
    .active {
      color: red;
    }
    </style>
  </head>
  <body>
    <div id="root">

        <header>
             <router-link to="/">Home</router-link>
             <router-link to="/about">About</router-link>
             <router-link to="/contact">Contact</router-link>
             <router-link to="/portfolio">Portfolio</router-link>
        </header>

        <div id="app" style="padding-top: 10px;">
            <keep-alive>
               <router-view></router-view>
            </keep-alive>
        </div>

    </div>

    <?php $isDevelopment = ENVIRONMENT === 'development'; ?>

    <script src="https://unpkg.com/vue@2.6.11/dist/vue.<?php echo ! $isDevelopment ? 'min.' : '' ?>js"></script>
    <script src="https://unpkg.com/vue-router@3.3.2/dist/vue-router.<?php echo ! $isDevelopment ? 'min.' : '' ?>js"></script>
    <script src="https://unpkg.com/vuex@3.4.0/dist/vuex.<?php echo ! $isDevelopment ? 'min.' : '' ?>js"></script>

    <script src="<?php echo base_url($isDevelopment
            ? '/js/app.js'
            : (
                // when after run webpack, allow to use bundled js
                // fallback to use /js/app.js when not
                file_exists(ROOTPATH . 'public/js/dist/bundle.js')
                    ? '/js/dist/bundle.js'
                    : '/js/app.js'
            )) ?>" type="module"></script>
  </body>
</html>