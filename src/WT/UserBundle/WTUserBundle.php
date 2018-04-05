<?php

namespace WT\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WTUserBundle extends Bundle
{
	public function getParent()
  	{
    	return 'FOSUserBundle';
  	}
}



