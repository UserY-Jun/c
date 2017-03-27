<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
&lt;?php<br />
class Calendar {<br />
  private $year; //当前的年<br />
  private $month; //当前的月<br />
  private $start_weekday; //当月的第一天对应的是周几<br />
  private $days; //当前月一共多少天
<p>  function __construct(){<br />
  $this-&gt;year=isset($_GET[&quot;year&quot;]) ? $_GET[&quot;year&quot;] : date(&quot;Y&quot;);<br />
  $this-&gt;month=isset($_GET[&quot;month&quot;]) ? $_GET[&quot;month&quot;] : date(&quot;m&quot;);<br />
  <br />
  $this-&gt;start_weekday=date(&quot;w&quot;, mktime(0, 0, 0, $this-&gt;month, 1, $this-&gt;year));<br />
  $this-&gt;days=date(&quot;t&quot;, mktime(0, 0, 0, $this-&gt;month, 1, $this-&gt;year));<br />
  }</p>
<p>  function out(){<br />
  echo '&lt;table align=&quot;center&quot;&gt;';<br />
  $this-&gt;chageDate(&quot;test.php&quot;);<br />
  $this-&gt;weeksList();<br />
  $this-&gt;daysList();<br />
  echo '&lt;/table&gt;';<br />
  }</p>
<p>  private function weeksList(){<br />
  $week=array('日','一','二','三','四','五','六');</p>
<p>   echo '&lt;tr&gt;';<br />
  for($i=0; $i&lt;count($week); $i++)<br />
  echo '&lt;th class=&quot;fontb&quot;&gt;'.$week[$i].'&lt;/th&gt;';</p>
<p>   echo '&lt;/tr&gt;';<br />
  }</p>
<p>  private function daysList(){<br />
  echo '&lt;tr&gt;';<br />
  //输出空格(当前一月第一天前面要空出来)<br />
  for($j=0; $j&lt;$this-&gt;start_weekday; $j++)<br />
  echo '&lt;td&gt; &lt;/td&gt;';</p>
<p><br />
  for($k=1; $k&lt;=$this-&gt;days; $k++){<br />
  $j++;<br />
  if($k==date('d'))<br />
  echo '&lt;td class=&quot;fontb&quot;&gt;'.$k.'&lt;/td&gt;';<br />
  else<br />
  echo '&lt;td&gt;'.$k.'&lt;/td&gt;';</p>
<p>    if($j%7==0)<br />
  echo '&lt;/tr&gt;&lt;tr&gt;';<br />
  <br />
  }</p>
<p>   //后面几个空格<br />
  while($j%7!==0){<br />
  echo '&lt;td&gt; &lt;/td&gt;';<br />
  $j++;<br />
  }</p>
<p>   echo '&lt;/tr&gt;';<br />
  }</p>
<p>  private function prevYear($year, $month){<br />
  $year=$year-1;<br />
  <br />
  if($year &lt; 1970)<br />
  $year = 1970;</p>
<p>   return &quot;year={$year}&amp;month={$month}&quot;; <br />
  }</p>
<p><br />
  private function prevMonth($year, $month){<br />
  if($month == 1) {<br />
  $year = $year -1;<br />
  <br />
  if($year &lt; 1970)<br />
  $year = 1970;</p>
<p>    $month=12;<br />
  }else{<br />
  $month--;<br />
  }</p>
<p>   return &quot;year={$year}&amp;month={$month}&quot;; <br />
  }</p>
<p><br />
  private function nextYear($year, $month){<br />
  $year = $year + 1;</p>
<p>   if($year &gt; 2038)<br />
  $year = 2038;</p>
<p>   return &quot;year={$year}&amp;month={$month}&quot;; <br />
  }</p>
<p><br />
  private function nextMonth($year, $month){<br />
  if($month==12){<br />
  $year++;</p>
<p>    if($year &gt; 2100)<br />
  $year=2100;</p>
<p>    $month=1;<br />
  }else{<br />
  $month++;<br />
  }<br />
</p>
<p>   return &quot;year={$year}&amp;month={$month}&quot;; <br />
  }</p>
<p>  private function chageDate($url=&quot;&quot;){<br />
  echo '&lt;tr&gt;';<br />
  echo   '&lt;td&gt;&lt;a href=&quot;?'.$this-&gt;prevYear($this-&gt;year,   $this-&gt;month).'&quot;&gt;'.'&lt;&lt;'.'&lt;/a&gt;&lt;/td&gt;';<br />
  echo '&lt;td&gt;&lt;a href=&quot;?'.$this-&gt;prevMonth($this-&gt;year, $this-&gt;month).'&quot;&gt;'.'&lt;'.'&lt;/a&gt;&lt;/td&gt;';<br />
  echo '&lt;td colspan=&quot;3&quot;&gt;';<br />
  echo '&lt;form&gt;';<br />
  echo   '&lt;select name=&quot;year&quot;   onchange=&quot;window.location=\''.$url.'?year=\'+this.options[selectedIndex].value+\'&amp;month='.$this-&gt;month.'\'&quot;&gt;';<br />
  for($sy=1970; $sy &lt;= 2100; $sy++){<br />
  $selected = ($sy==$this-&gt;year) ? &quot;selected&quot; : &quot;&quot;;<br />
  echo '&lt;option '.$selected.' value=&quot;'.$sy.'&quot;&gt;'.$sy.'&lt;/option&gt;';<br />
  }<br />
  echo '&lt;/select&gt;';<br />
  echo   '&lt;select name=&quot;month&quot;    onchange=&quot;window.location=\''.$url.'?year='.$this-&gt;year.'&amp;month=\'+this.options[selectedIndex].value&quot;&gt;';<br />
  for($sm=1; $sm&lt;=12; $sm++){<br />
  $selected1 = ($sm==$this-&gt;month) ? &quot;selected&quot; : &quot;&quot;;<br />
  echo '&lt;option '.$selected1.' value=&quot;'.$sm.'&quot;&gt;'.$sm.'&lt;/option&gt;';<br />
  }<br />
  echo '&lt;/select&gt;';<br />
  echo '&lt;/form&gt;'; <br />
  echo '&lt;/td&gt;';</p>
<p><br />
  echo '&lt;td&gt;&lt;a   href=&quot;?'.$this-&gt;nextYear($this-&gt;year,   $this-&gt;month).'&quot;&gt;'.'&gt;&gt;'.'&lt;/a&gt;&lt;/td&gt;';<br />
  echo '&lt;td&gt;&lt;a href=&quot;?'.$this-&gt;nextMonth($this-&gt;year, $this-&gt;month).'&quot;&gt;'.'&gt;'.'&lt;/a&gt;&lt;/td&gt;';<br />
  echo '&lt;/tr&gt;';<br />
  }</p>
<p> }<br />
  ?&gt;</p>
</body>
</html>