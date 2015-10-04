<?php

    function login($user = null)
    {
        session(['current_user' => $user]);
    }

    function logout()
    {
        session(['current_user' => null]);
    }
    
    function current_user()
    {
        return session('current_user');
    }
    
    