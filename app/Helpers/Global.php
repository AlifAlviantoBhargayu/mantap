<?php
use App\Murid;
use App\Bunda;

function totalMurid()
{
   return Murid::count();
}
function totalBunda()
{
    return Bunda::count();
}
