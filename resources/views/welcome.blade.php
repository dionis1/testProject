<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Test Project</title>


      <meta name="csrf-token" content="{{ csrf_token() }}">
      
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   </head>
   <body>
      <div id="app">
         <section class="hero is-primary is-medium">
            <!-- Hero head: will stick at the top -->
           <nav class="navbar is-transparent">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
                </a>
                <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
                <span></span>
                <span></span>
                <span></span>
                </div>
            </div>

            <div id="navbarExampleTransparentExample" class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="field is-grouped">
                            <p class="control">
                                <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="https://twitter.com/intent/tweet?text=Bulma: a modern CSS framework based on Flexbox&amp;hashtags=bulmaio&amp;url=http://localhost:4000&amp;via=jgthms">
                                <span>
                                    Tweet
                                </span>
                                </a>
                            </p>
                            <p class="control">
                                <a class="button is-primary" href="https://github.com/jgthms/bulma/releases/download/0.7.1/bulma-0.7.1.zip">
                                <span>Download</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
           </nav>
            
            <!-- Hero content: will be in the middle -->
            <div class="section">
               <div class="container is-fluid">
                  <h1 class="title">Title</h1>
                  <hr class="title-underline">
                  <div class="is-mobile is-4">
                      
                      <create-component></create-component>
                      
                      <show-component></show-component>
                  </div>
               </div>
            </div>
            <!-- Hero footer: will stick at the bottom -->
            <div class="hero-foot is-mobile">
               <nav class="tabs">
                  <div class="container">
                     <ul>
                        <li><a>Overview</a></li>
                        <li><a>Modifiers</a></li>
                        <li><a>Grid</a></li>
                        <li><a>Elements</a></li>
                        <li><a>Components</a></li>
                        <li><a>Layout</a></li>
                     </ul>
                  </div>
               </nav>
            </div>
         </section>
      </div>
   </body>
</html>