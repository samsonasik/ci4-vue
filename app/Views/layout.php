<html>
  <head>
    <style type="text/css">
    .active {
      color: red;
    }
    header a {
      padding-right: 5px;
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
            <router-view v-slot="{ Component }">
              <keep-alive>
                <component :is="Component" />
              </keep-alive>
            </router-view>
        </div>

    </div>

    <?php $isDevelopment = ENVIRONMENT === 'development'; ?>

    <script src="https://unpkg.com/vue@3.2.31/dist/vue.global.<?php echo ! $isDevelopment ? 'prod.' : '' ?>js"></script>
    <script src="https://unpkg.com/vue-router@4.0.14/dist/vue-router.global.<?php echo ! $isDevelopment ? 'prod.' : '' ?>js"></script>
    <script src="https://unpkg.com/vuex@4.0.2/dist/vuex.global.<?php echo ! $isDevelopment ? 'prod.' : '' ?>js"></script>

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