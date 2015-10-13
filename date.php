<?php


print "Now: " . date("Y - m - d (l)");
$time = strtotime("next day");
print "Next day: " . date("Y - m - d (l)",$time);
