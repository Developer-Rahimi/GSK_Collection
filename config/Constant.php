<?php
        $server="http://gsk.whereapp.ir/";
        return [
            "ServicePath"=> [
                "GetUser"                   => $server."User",
                "GetContent"                => $server."Contents",
                "Comment"                   => $server."Comment",
                "Order"                   => $server."Order",
                "Contact"                   => $server."Contact",
                "Cart"                   => $server."Cart",
                "Login"                     => $server."User/Login",
                "EmailCheck"                => $server."User/Email/Check",
                "Register"                  => $server."User/Register",
                "Product"                       => $server."Product",
                "Tag"                       => $server."Tag",
                "Specification"            => $server."Specification",
                "SubSpecification"            => $server."SubSpecification",
                "Introduction"            => $server."Introduction",
                "Image"                    => $server."Image",
            ],
        ];
