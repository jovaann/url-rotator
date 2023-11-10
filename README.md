# url-rotator
A WordPress plugin for assigning unlimited # of URLs to link or a button, which will be randomly rotated

============================================================================================

<b>Usage:</b><br>
Settings -> URL Rotator
- Add a new URL<br>
  --> Insert plain URL to rotate without http/https
- Manage URLs<br>
  --> See the list of added URLs and delete if needed
- Rotation class settings<br>
  --> Insert HTML element's class to be used to assign URL(s).

============================================================================================

<b>Helper:</b><br>
If you want to assign a class to header menu item link, you can use this code in your functions.php file or as mu-plugin.<br>
Don't forget to replace "30" with your menu item ID and "your-class-here" with the actual class you want to use.

<pre>function assign_class_to_menu_item_link($atts, $item, $args) {
  if ($item->ID === 30) { 
      $atts['class'] = 'your-class-here';
  }
  return $atts;
}</pre>
