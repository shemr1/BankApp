<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-300">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="#"></a>
            </li>
            @auth
            <li>
                <a href="{{ route('dashboard') }}"class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('transactions') }}"class="p-3">Transactions</a>
            </li> 
            <li>
                <div class="flex flex-wrap">
                    <div class="w-full sm:w-6/12 md:w-4/12 px-4">
                      <div class="relative inline-flex align-middle w-full">
                        <button class=" font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 bg-blueGray-700 ease-linear transition-all duration-150" type="button" onclick="openDropdown(event,'dropdown-id')">
                          Account
                        </button>
                        <div class="hidden bg-white  text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mb-1" style="min-width:12rem" id="dropdown-id">
                          <a href="{{ route('accounts') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Account Summary
                          </a>
                          <a href="{{ route('deposit') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Deposit
                          </a>
                          <a href="{{ route('transfer') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Transfer to own account
                          </a>
                          <div class=" my-2 border border-solid border-t-0 border-blueGray-800 opacity-25"></div>
                          <a href="{{ route('migrate') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Transfer to another individual
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
                  <script>
                    function openDropdown(event,dropdownID){
                      let element = event.target;
                      while(element.nodeName !== "BUTTON"){
                        element = element.parentNode;
                      }
                      var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
                        placement: 'top-end'
                      });
                      document.getElementById(dropdownID).classList.toggle("hidden");
                      document.getElementById(dropdownID).classList.toggle("block");
                    }
                  </script>
                
            </li>
            @endauth
            
        </ul>
        <ul class="flex items-center">
            @auth
            <li>
                <a href=""class="p-3">{{ auth()->user()->name }}</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post" class="p-3 inline" >
                @csrf
               <button type="submit" >Logout</button>
                </form>
            </li>
            @endauth
            
            @guest
            <li>
                <a href="{{ route('login') }}"class="p-3">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}"class="p-3">Register</a>
            </li>  
            @endguest
            
            
                       
        </ul>
    </nav>
    @yield('content')
</body>
</html>