<html>
  <head>

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

    <script src="https://unpkg.com/vue@2.6.11/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router@3.3.2/dist/vue-router.js"></script>
    <script src="https://unpkg.com/vuex@3.4.0/dist/vuex.js"></script>
    <script src="/js/app.js"></script>
  </body>
</html>