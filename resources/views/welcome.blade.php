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
            <div class="hero-head">
               <nav class="navbar">
                  <div class="container">
                     <div class="navbar-brand">
                        <a class="navbar-item">
                        <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo">
                        </a>
                        <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                        <span></span>
                        <span></span>
                        </span>
                     </div>
                     <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                           <a class="navbar-item is-active">
                           Home
                           </a>
                           <a class="navbar-item">
                           Examples
                           </a>
                           <a class="navbar-item">
                           Documentation
                           </a>
                        </div>
                     </div>
                  </div>
               </nav>
            </div>
            
            <!-- Hero content: will be in the middle -->
            <div class="hero-body">
               <div class="container">
                  <h1 class="title">Title</h1>
                  <div class="columns is-mobile is-7">
                     <div class="column box is-one-quarter">
                      <h2 class="tile is-2">Title</h2>
                         <ul>
                          <li>1</li>
                          <li>2</li>
                          <li>3</li>
                          <li>4</li>
                          <li>5</li>
                          <li>6</li>
                          <li>7</li>
                          <li>8</li>
                          <li>9</li>
                          <li>10</li>
                          <li>11</li>
                          <li>12</li>
                          <li>13</li>
                          <li>14</li>
                          <li>15</li>
                          <li>Pagination</li>
                         </ul>
                     </div> 

                     <create-component></create-component>

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