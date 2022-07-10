<?
mysqli_select_db($connectionSql, $sql_database);
$query_search_config = "SELECT * FROM config WHERE id_config = '1' LIMIT 0,1";
$search_config = mysqli_query($connectionSql, $query_search_config) or die(mysqli_error());
$row_search_config = mysqli_fetch_assoc($search_config);
$totalRows_search_config = mysqli_num_rows($search_config);

mysqli_select_db($connectionSql, $sql_database);
$query_search_interfaceweb = "SELECT * FROM interface_web WHERE id_interface_web = '1' LIMIT 0,1";
$search_interfaceweb = mysqli_query($connectionSql, $query_search_interfaceweb) or die(mysqli_error());
$row_search_interfaceweb = mysqli_fetch_assoc($search_interfaceweb);
$totalRows_search_interfaceweb = mysqli_num_rows($search_interfaceweb);

mysqli_select_db($connectionSql, $sql_database);
$query_search_interfacemobile = "SELECT * FROM interface_mobile WHERE id_interface_mobile = '1' LIMIT 0,1";
$search_interfacemobile = mysqli_query($connectionSql, $query_search_interfacemobile) or die(mysqli_error());
$row_search_interfacemobile = mysqli_fetch_assoc($search_interfacemobile);
$totalRows_search_interfacemobile = mysqli_num_rows($search_interfacemobile);
?>