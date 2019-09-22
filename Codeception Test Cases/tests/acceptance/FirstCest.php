<?php


class FirstCest
{
	
	public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
      
    }
	
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

}
