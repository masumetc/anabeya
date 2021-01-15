<aside class="left-sidebar">
<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- User Profile-->
    <div class="user-profile">
        <div class="user-pro-body">
            <!--<div><img src="{{URL::to('public/assets/images/users/2.jpg')}}" alt="user-img" class="img-circle"></div>-->
            <div class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}<span class="caret"></span></a>
                <div class="dropdown-menu animated flipInY">
                    <!-- text-->
                    <a href="{{URL::to('curier/user-profile')}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <a href="{{route('logout')}}" class="dropdown-item"><i class=" ti-hand-point-left"></i> Logout</a>
                    <!-- text-->
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <!--<li>-->
            <!--    <div class="hide-menu text-center">-->
            <!--        <div id="eco-spark"></div>-->
            <!--        <small>TOTAL EARNINGS</small>-->
            <!--        <h4>$00.00</h4>-->
            <!--    </div>-->
            <!--</li>-->
            
            @if(Auth::user()->role == 'seller' || Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-package"></i><span class="hide-menu">Shop</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('product.product')}}">Product 
                    <!--<span class="badge badge-pill badge-cyan ml-auto">4</span>-->
                    </a></li>
                    @if(Auth::user()->role == 'seller' && Auth::user()->status == '1')
                    <li><a href="{{route('product.add-product')}}">Add Product</a></li>
                    @endif
                </ul>
            </li>
            @endif
            <!-- Seller, manager, super admin Shop end-->
            
            @if(Auth::user()->role == 'seller' || Auth::user()->role == 'curier' || Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-shopping-cart-full"></i><span class="hide-menu">Order</span></a>
                <ul aria-expanded="false" class="collapse">
                    @if(Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
                                                            <li><a href="{{route('pending_order')}}">Pending Order</a></li>
                    <li><a href="{{route('waiting.order')}}">Wait For-6h</a></li>
                    @endif
                    @if(Auth::user()->role == 'seller' || Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
                                        <li><a href="{{route('ready_ship')}}">Ready To Ship</a></li>


                    @endif
                    @if(Auth::user()->role == 'curier' || Auth::user()->role == 'seller' || Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
                    <li><a href="{{route('order.new-order')}}">New Order</a></li>
                    <li><a href="{{route('order.ship')}}">Shipping</a></li>
                    <li><a href="{{route('order.order-processing')}}">Processing Order</a></li>
                    <li><a href="{{route('order.order-delivery')}}">Delivery Order</a></li>
                    <li><a href="{{route('order.cancel_customer')}}">Cancel Customer</a></li>
                    <li><a href="{{route('order.cancel_seller')}}">Cancel seller</a></li>
                    <li><a href="{{route('order.cancel_admin')}}">Cancel admin</a></li>
                    @endif
                </ul>
            </li>
            @endif
            <!-- Seller, courier, manager, super admin Order end-->
            
            @if(Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Seller</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('seller.new-seller')}}">New Seller <span class="badge badge-pill badge-cyan ml-auto">4</span></a></li>
                    <li><a href="{{route('seller.all-seller')}}">All Seller</a></li>
                </ul>
            </li>
            @endif
            <!-- manager, super admin Seller end-->
            
            @if(Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-truck"></i><span class="hide-menu">Curier</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('curier.curier')}}"> Curier <span class="badge badge-pill badge-cyan ml-auto"></span></a></li>
                </ul>
            </li>
            @endif
            <!-- manager, super admin Courier end-->
            
            @if(Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-wheelchair"></i><span class="hide-menu">Customer</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('customer.new-customer')}}">New Customer</a></li>
                    <li><a href="{{route('customer.basic-customer')}}">Basic Customer</a></li>
                    <li><a href="{{route('customer.plutinum-customer')}}">Plutinum Customer</a></li>
                    <li><a href="{{route('customer.gold-customer')}}">Gold Customer</a></li>
                    <li><a href="{{route('customer.customer-profile')}}">Customer Profile</a></li>
                </ul>
            </li>
            @endif
            <!-- manager, super admin Customer Managment end-->
            
            @if(Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-wheelchair"></i><span class="hide-menu">Category</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('category.view-category')}}">View Category</a></li>
                </ul>
            </li>
            @endif
            <!-- manager, super admin Category end-->
            
            @if(Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-wheelchair"></i><span class="hide-menu">Settings</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('settings.frontend-settings')}}">Front End Settings</a></li>
                    <li><a href="{{route('settings.backend-settings')}}">Back End Setting</a></li>
                </ul>
            </li>
            @endif
            <!-- manager, super admin Settings end-->
            
            @if(Auth::user()->role == 'superadmin')
            <!--<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-wheelchair"></i><span class="hide-menu">Payment Getway</span></a>-->
            <!--    <ul aria-expanded="false" class="collapse">-->
            <!--        <li><a href="{{route('paymentGetway.add-payment-getway')}}">ADD Payment Getway</a></li>-->
            <!--        <li><a href="{{route('paymentGetway.payment-settings')}}">Payment Settings</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            @endif
            
            
            
            
            @if(Auth::user()->role == 'superadmin')
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-wheelchair"></i><span class="hide-menu">Refund</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('pending_refund')}}">Pending Refund</a></li>
                    <li><a href="{{route('success_refund')}}">Success Refund</a></li>
                </ul>
            </li>
            @endif
            
            
            <!-- super admin Payment getway end-->
            
            @if(Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-wheelchair"></i><span class="hide-menu">Currency</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('currency.create')}}">ADD Currency</a></li>
                    <li><a href="{{route('currency.index')}}">Currency List</a></li>
                </ul>
            </li>
            
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-wheelchair"></i><span class="hide-menu">Transaction</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{url('transaction/user')}}">User List</a></li>
                    <li><a href="{{url('transaction/list')}}">Transaction List</a></li>
                </ul>
            </li>
            @endif
            
             @if(Auth::user()->role == 'seller' || Auth::user()->role == 'curier')
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-wheelchair"></i><span class="hide-menu">Transaction</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('transaction/list')}}">Transaction</a></li>
                    </ul>
                </li>
            @endif
            <!-- super admin Payment getway end-->

            <li> 
                <a class="waves-effect waves-dark" href="{{route('logout')}}" aria-expanded="false"><i class="ti-hand-point-left"></i><span class="hide-menu">Log Out</span></a>
            </li>
        </ul>
    </nav>
<!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
</aside>
