 <!-- Layout wrapper -->
 <div class="layout-wrapper layout-content-navbar">
     <div class="layout-container">
         <!-- Menu -->
         <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme"  >
             <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                   
                    <span class="app-brand-text demo fw-bolder ms-2" style="color: rgb(3, 3, 112)">STUNTFOOD</span>
                    <img src="" alt="">
                </a>
                
                
                 <a href="javascript:void(0);"
                     class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                     <i class="bx bx-chevron-left bx-sm align-middle"></i>
                 </a>
             </div>

             <div class="menu-inner-shadow"></div>

             <ul class="menu-inner py-1">
                @if (session('Role') != 'Bidan')
                 <li class="menu-item active">
                     <a href="{{ url('/spk') }}" class="menu-link">
                         <i class="menu-icon fas fa-calculator" ></i>
                         
                         <div data-i18n="Analytics" style="color: black">SPK</div>
                     </a>
                 </li>
                 @endif

                 @if (session('Role') == 'Bidan')
                 <!-- Data Makanan -->
                 <li class="menu-item">
                     <a href="{{ url('/datamakananadmin') }}" class="menu-link">
                         <i class="menu-icon fas fa-apple-alt text-primary"></i> <!-- Ikon berwarna untuk makanan -->
                         <div data-i18n="Analytics"> Data Makanan</div>
                     </a>
                 </li>
                 @endif
                 
                 

                 
                 @if (session('Role') == 'Bidan')
                 <!-- Data Resep -->
                 <li class="menu-item">
                     <a href="{{ url('/data') }}" class="menu-link">
                         <i class="menu-icon fas fa-book text-primary"></i> <!-- Ikon berwarna untuk resep -->
                         <div data-i18n="Analytics"> Data Resep</div>
                     </a>
                 </li>
                 @endif
                 

                @if (session('Role') != 'Bidan')
                 <!-- Dashboard -->
                 <li class="menu-item">
                     <a href="{{ url('/resep') }}" class="menu-link">
                         <i class="menu-icon tf-icons bx bx-home-circle"></i>
                         <div data-i18n="Analytics"> Resep </div>
                     </a>
                 </li>
                 @endif
             </ul>

           


         </aside>

<!-- Tautkan Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">       
