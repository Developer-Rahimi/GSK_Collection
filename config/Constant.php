<?php
        $server="http://gsk.whereapp.ir/";
        return [
            "ServicePath"=> [
                "GetUser"                   => $server."User",
                "GetContent"                => $server."Contents",
                "Comment"                => $server."Comment",
                "Contact"                => $server."Contact",
                "Login"                => $server."User/Login",
                "EmailCheck"                => $server."User/Email/Check",
                "Register"                => $server."User/Register",
            ],
        ];
