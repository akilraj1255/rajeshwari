
    <!--header ends here-->
    <!--navigation starts here-->

	 <!--navigation ends here-->
     <!--banner starts here-->
     <!--<section id="innerbanner"><img src="images/innerbanner.png" width="1000" height="168"></section>-->
      <!--banner ends here-->
      <!--midsection starts here-->
      
      <!--midsection ends here-->
      <!--innersection starts here-->
      <div id="parent_Sect">
      <?php $this->renderPartial('leftside');?> 
      <?php
	 $std=StudentAttentance::model()->findAll("student_id=:x", array(':x'=>'12'));
	
	  function getweek($date,$month,$year)
{
$date = mktime(0, 0, 0,$month,$date,$year); 
$week = date('w', $date); 
switch($week) {
case 0: 
return 'Sun';
break;
case 1: 
return 'Mon';
break;
case 2: 
return 'Tue';
break;
case 3: 
return 'Wed';
break;
case 4: 
return 'Thu';
break;
case 5: 
return 'Fri';
break;
case 6: 
return 'Sat';
break;
}
}
	  $model = new EmployeeAttendances;
	  if(!isset($_REQUEST['mon']))
	{
		$mon = date('F');
		$mon_num = date('n');
		$curr_year = date('Y');
	}
	else
	{
		$mon = $model->getMonthname($_REQUEST['mon']);
		$mon_num = $_REQUEST['mon'];
		$curr_year = $_REQUEST['year'];
		
	}
	$num = cal_days_in_month(CAL_GREGORIAN, $mon_num, $curr_year); // 31
	?>
                      
    <?php
	 for($i=1;$i<=$num;$i++)
	 {
		
       
	 }
	  ?>
        <div id="parent_rightSect">
        	<div class="parentright_innercon">
            	<h1>Attendance</h1>
                
                <div class="top_but">
                	<ul>
                    	<li><a href="#" class="active">Year</a></li>
                        <li><a href="#">Month</a></li>
                        <li><a href="#">Day</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
       		  	<div class="year_cal">
                	<div class="small_calendar">
                    	<div class="cal_head">January 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td class="abs_col">3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="small_calendar">
                    	<div class="cal_head">February 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td>3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="small_calendar">
                    	<div class="cal_head">March 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td>3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="small_calendar">
                    	<div class="cal_head">April 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td>3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="small_calendar">
                    	<div class="cal_head">May 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td>3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                <div class="small_calendar">
                    	<div class="cal_head">June 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td>3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="small_calendar">
                    	<div class="cal_head">July 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td>3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="small_calendar">
                    	<div class="cal_head">August 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td>3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="small_calendar">
                    	<div class="cal_head">September 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td>3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="small_calendar">
                    	<div class="cal_head">October 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td >&nbsp;</td>
                                    <td >1</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td class="abs_col">&nbsp;</td>
                                    <td>3</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                  </tr>
                                  <tr>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td >12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                  </tr>
                                  <tr>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td >19</td>
                                    <td >20</td>
                                    <td>21</td>
                                    <td>21</td>
                                  </tr>
                                  <tr>
                                    <td >23</td>
                                    <td>24</td>
                                    <td>25</td>
                                    <td>26</td>
                                    <td>27</td>
                                    <td class="abs_col">&nbsp;</td>
                                    <td >29</td>
                                  </tr>
                                </table>

                        </div>
                    </div>
                    <div class="small_calendar">
                    	<div class="cal_head">November 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td>3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="small_calendar">
                    	<div class="cal_head">December 2012</div>
                        <div class="cal_panel">
                        <div class="month_row">
                        	<ul>
                            	<li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                 <li>Sun</li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td >&nbsp;</td>
                            <td >1</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="abs_col">&nbsp;</td>
                            <td>3</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td >12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td >19</td>
                            <td >20</td>
                            <td>21</td>
                            <td>21</td>
                          </tr>
                          <tr>
                            <td >23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td class="abs_col">&nbsp;</td>
                            <td >29</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                
            </div>
        </div>
        <div class="clear"></div>
      </div>
      <!--innersection ends here-->

	 <?php include('footer.php');?>
     
