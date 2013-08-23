<?php
/*Spanish Language File*/

class language
{
	/*Login Start*/
	var $login='Ingresar';
    var $loginWelcomeMessage='Bienvenido al sistema de Punto de Venta PHP. Para&nbsp; continuar, favor de ingresar usando tu nombre de usuario &nbsp; y contraseña abajo.';
    var $username='Usuario';
    var $password='Contraseña';
    var $go='Adelante!';
	/*Login End*/
	
		
	/*Menubar Start*/
    var $home='Inicio';
    var $customers='Clientes';
    var $items='Artículos';
    var $reports='Reportes';
    var $sales='Ventas';
    var $config='Config';
    var $poweredBy='Powered by';
    var $welcome='Bienvenido';
    var $logout='Salir';
	/*Menubar End*/

	
	/*Home Start*/
	var $welcomeTo='Bienvenidos a ';
	var $adminHomeWelcomeMessage='sistema de Punto de Venta.&nbsp; Estas actualmente ingresado <br>como un administrador.<br> Con derechos administrativos, puedes ir a cualquier lugar y hacer cualquier cosa en este sistema.&nbsp;<br>Alternativamente, puedes seleccionar cualquier de las siguientes opciones:';
    var $salesClerkHomeWelcomeMessage='sistema de Punto de Venta! Para empezar,<br>favor de seleccionar la opción de Ventas del menú.';
    var $reportViewerHomeWelcomeMessage='sistema de Punto de Venta! Para empezar,<br>favor de seleccionar la opción de Reportes del menú.';
    var $processSale='Hacer una Venta';
    var $addRemoveManageUsers='Agregar, Borrar, o Administrar Usuarios';
    var $addRemoveManageCustomers='Agregar, Borrar, o Administrar Clientes';
    var $addRemoveManageItems='Agregar, Borrar, o Administrar Artículos';
    var $viewReports='Ver Reportes';
    var $configureSettings='Configurar Punto de Venta';
    var $viewOnlineSupport='Ver Apoyo Técnico en línea';
	/*Home End*/
	
	
	/*Users Home Start*/
	var $createUser='Crear un Usuario Nuevo';
    var $manageUsers='Administrar Usuarios';	
    /*Users Home End*/
	
	
	/*Users Form Start*/
	var $addUser='Agregar Usuario';
	var $usedInLogin='usado al ingresar';
    var $type='Tipo';
    var $admin='Admin';
    var $salesClerk='Cajero';
    var $reportViewer='Encargado de Reportes';
    var $confirmPassword='Confirmar Contraseña';
	/*Users Form End*/


	/*Manage Users Start*/
	var $searchForUser='Buscar por Usuario (Por Nombre de Usuario)';
    var $searchedForUser='Buscado por Nombre de Usuario';
	var $deleteUser='Borrar Usuario';
    var $updateUser='Actualizar Usuario';
	/*Manage Users End*/
	
	
	/*Customers Home Start*/
    var $customersWelcomeScreen='Bienvenido a la pantalla de Clientes!&nbsp;Aqui puedes administrar tu base de clientes.&nbsp;Tienes que agregar un cliente antes de hacer una venta. <br>¿Qué quieres hacer?';
    var $createNewCustomer='Crear un Cliente nuevo';
    var $manageCustomers='Administar Clientes';
    var $customersBarcode='Hoja de Códigos de Barra de Clientes';
	/*Customers Home End*/
    
    
 	/*Customers Form Start*/
 	var $addCustomer='Agregar Cliente';
    var $firstName='Nombre';
    var $lastName='Apellido';
    var $accountNumber='Número de Cuenta';
    var $phoneNumber='Teléfono';
    var $email='Correo Electrónico';
    var $streetAddress='Dirección';
    var $commentsOrOther='Comentarios/Otro';
 	/*Customers Form End*/
 	
 	
 	/*Manage Customers Start*/
 	var $updateCustomer='Actualizar Cliente';
    var $deleteCustomer='Borrar Cliente';
    var $searchForCustomer='Buscar Cliente (por apellido)';
    var $searchedForCustomer='Buscado por Cliente';
	var $listOfCustomers='Lista de Clientes';
	/*Manage Customers End*/
	
	
	/*Items Home Start*/
    var $itemsWelcomeScreen='Bienvenido a la pantalla de Artículos.&nbsp; Aqui puedes administrar Artículos, Marcas, Catagorías, y Proveedores.&nbsp; Antes de hacer una venta, necesitas agregar por lo menos una Catagoría, una marca, un proveedor, y un artículo.&nbsp;<br>¿Qué quieres hacer?';
    var $createNewItem='Crear un Artículo Nuevo';
    var $manageItems='Administrar Artículos';
    var $itemsBarcode='Hoja de Códigos de Barra de Artículos';
    var $createBrand='Crear una Nueva Marca';
    var $manageBrands='Administar Marcas';
    var $createCategory='Crear una Catagoría Nueva';
    var $manageCategories='Administar Catagorías';
    var $createSupplier='Crear un Proveedor Nuevo';
    var $manageSuppliers='Administar Proveedores';
	/*Items Home End*/	
 	
 	
 	/*Items Form Start*/
 	var $itemName='Nombre de Artículo';
    var $description='Descripcion';
    var $itemNumber='Número de Artículo';
    var $brand='Marca';
    var $category='Categoria';
    var $supplier='Proveedor';
    var $buyingPrice='Costo';
    var $sellingPrice='Precio de Venta';
    var $tax='Impuesto';
    var $supplierCatalogue='Número del Catálogo de Proveedor';
    var $quantityStock='Cantidad en Existencia';
 	var $users='Usuarios';
    var $itemsInBoldRequired='Se Requieren los Campos en Negrita';
    var $update='Actualizar';
    var $delete='Borrar';
    var $addItem='Agregar Artículo';
    var $brandsCategoriesSupplierError='Tienes que crear Marcas, Catagorías, y Proveedores antes de crear un Artículo<br><a href=index.php>Regresar a Pantalla de Artículos</a>';
    var $finalSellingPricePerUnit='Precio Final por Unidad';
	/*Items Form End*/
	
	
	/*Manage Items Start*/
	var $updateItem='Actualizar Artículo';
    var $deleteItem='Borrar Artículo';
    var $searchForItem='Buscar por Artículo (Por Nombre de Artículo)';
    var $searchedForItem='Buscado por Artículo';
    var $listOfItems='Lista de Artículos';
    var $showOutOfStock='Mostrar Artículos sin Existencias';
    var $outOfStock='Artículos sin Existencias';
	/*Manage Items End*/
	
    
    /*Brands Form Start*/
    var $brandName='Nombre de Marca';
    var $addBrand='Agregar Marca';
	/*Brands Form End*/
    
    
    /*Manage Brands Start*/
    var $searchForBrand='Buscar por Marca (Por nombre de Marca)';
    var $searchedForBrand='Buscado por Marca' ;
    var $listOfBrands='Lista de Marcas';
    var $updateBrand='Actualizar Marca';
    var $deleteBrand='Borrar Marca';
	/*Manage Brands End*/
    
    
    /*Categories Form Start*/
    var $categoryName='Nombre de Catagoría';
    var $addCategory='Agregar Categoria';
	/*Categories Form End*/


    /*Manage Categories Start*/
	var $searchForCategory='Buscar por Categoria (Por nombre de Catagoría)';
    var $searchedForCategory='Buscado por Categoria';
    var $listOfCategories='Lista de Categorias';
    var $updateCategory='Actualizar Categoria';
    var $deleteCategory='Borrar Categoria';
    /*Manage Categories End*/
    
    
    /*Suppliers Form Start*/
    var $supplierName='Nombre de Proveedor';
    var $address='Dirección';
    var $contact='Contacto';
    var $other='Otro';
	/*Suppliers Form End*/


    /*Manage Suppliers Start*/
    var $listOfSuppliers='Lista de Proveedores';
    var $searchForSupplier='Buscar por Proveedor (por nombre de Proveedor)';
    var $searchedForSupplier='Buscado por Proveedor';
    var $addSupplier='Agregar Proveedor';
    var $updateSupplier='Actualizar Proveedor';
    var $deleteSupplier='Borrar Proveedor';
    /*Manage Suppliers End*/


	/*Reports Home Start*/
	var $reportsWelcomeMessage='Bienvenio a la pantalla de Reportes!&nbsp; Aqui puedes ver reportes basados en ventas.&nbsp;<br>¿Qué quieres hacer?';
    var $allCustomersReport='Reporte de Todos los Clientes';
    var $allEmployeesReport='Reporte de Todos los Empleados';
    var $allItemsReport='Reporte de Todos los Artículos';
    var $brandReport='Informe De la Marca de f‡brica';
    var $categoryReport='Informe De la Categor’a';
    var $customerReport='Reporte de Clientes';
    var $dailyReport='Reporte Diario';
    var $dateRangeReport='Reporte de Rango de Fechas';
    var $employeeReport='Reporte de Empleados';
    var $itemReport='Reporte de Artículos';
    var $profitReport='Reporte de Utilidades';
    var $taxReport='Informe Del Impuesto';
	/*Reports Home End*/
	
	
	/*Input Needed Form Start*/
	var $inputNeeded='Input needed for';
    var $dateRange='Rango de Fechas';
    var $today='Hoy';
    var $yesterday='Ayer';
    var $last7days='Ultimos 7 Dias';
    var $lastMonth='Ultimo Mes';
    var $thisMonth='Mes Actual';
    var $thisYear='Año Actual';
    var $allTime='Todo el tiempo';
    var $findBrand='Buscar Marca de f‡brica';
    var $selectBrand='Seleccionar Marca de f‡brica';
    var $findCategory='Buscar Categor’a';
    var $selectCategory='Seleccionar Categor’a';
    var $findCustomer='Buscar Cliente';
    var $selectCustomer='Seleccionar Cliente';
    var $findEmployee='Buscar Empleado';
    var $selectEmployee='Seleccionar Empleado';
    var $findItem='Buscar Artículo';
    var $selectItem='Seleccionar Artículo';
    var $selectTax='Seleccionar Impuesto';
	/*Input Needed Form End*/
    
    
    /*"All" Reports Start*/
		
		/*All Customers Report Start*/
		var $itemsPurchased='Artículos Comprados';
   		var $moneySpentBeforeTax='Compras excluyendo impuestos';
    	var $moneySpentAfterTax='Compras incluyendo impuestos';
		var $totalItemsPurchased='Total de Artículos Comprados';
		/*All Customers Report End*/
		
		/*All Employees Report Start*/
		var $totalItemsSold='Total de Artículos Vendidos';
    	var $moneySoldBeforeTax='Ventas excluyendo Impuestos';
		var $moneySoldAfterTax='Ventas incluyendo impuestos';
		/*All Employees Report End*/
		
		/*All Items Report Start*/
		var $numberPurchased='Número Comprado';
   		var $subTotalForItem='Subtotal por Artículo';
        var $totalForItem='Total por Artículo';
		/*All Items Report End*/
	
	/*"All" Reports End*/
	
	
	/*Other Reports Start*/
	var $paidWith='Pagado Con';
    var $soldBy='Vendido Por';
    var $saleDetails='Detalles de la Venta';
    var $saleSubTotal='Subtotal de la Venta';
    var $saleTotalCost='Total de la Venta';
    var $showSaleDetails='Mostrar detalles de la Venta';
    var $listOfSaleBy='Lista de Ventas por';
    var $listOfSalesFor='Lista de Ventas para';
    var $listOfSalesBetween='Lista de Ventas <br>entre las fechas';
    var $and='y';
    var $between='entre';
    var $totalWithOutTax='Total (sin Impuestos)';
    var $totalWithTax='Total (con Impuestos)';
	var $fromMonth='Desde Mes';
    var $day='Dia';
    var $year='Año';
    var $toMonth='Hasta Mes';
    var $totalAmountSoldWithOutTax='Total de Ventas (sin Impuestos)';
    var $profit='Utilidad';
    var $totalAmountSold='Total de Ventas';
    var $totalProfit='Total de Utilidades';
    var $totalsShownBetween='Totales por ventas entre';
    var $totalItemCost='Total de Costo de Artículo';
	/*Other Reports End*/
		
		
	/*Sales Home Start*/
	var $salesWelcomeMessage='Bienvenido a la pantalla de Ventas!&nbsp; Aqui puedes crear ventas y administrar las.&nbsp; ¿Qué quieres hacer?';
    var $startSale='Crear una Venta Nueva';
    var $manageSales='Administar Ventas';
	/*Sales Home End*/
	
	
	/*Sale Interface Start*/
    var $yourShoppingCartIsEmpty='No hay nada en su Venta';
    var $addToCart='Agregar a Venta';
    var $clearSearch='Borrar Buscar';
    var $saleComment='Commentario de Venta';
    var $addSale='Agregar Venta';
    var $quantity='Cantidad';
    var $remove='Borrar';
    var $cash='Efectivo';
	var $check='Cheque';
	var $credit='Credito';
	var $giftCertificate='Cupón';
	var $account='Cuenta';
	var $mustSelectCustomer='Tienes que seleccionar un cliente';
	var $newSale='Venta Nueva';
	var $clearSale='Borrar Venta';
	var $newSaleBarcode='Venta Nueva con scanner de Códigos de barra';
	var $scanInCustomer='Leer Código de Cliente ';
	var $scanInItem='Leer Código de Articlo';
	var $shoppingCart='Venta';
	var $customerID='Número de indentificación de Cliente';
	var $itemID='Número de indentificación de Artículo';
	/*Sale Interface End*/
	
	
	/*Sale Receipt Start*/
	var $orderBy='Venta a';
	var $itemOrdered='Artículo vendido';
	var $extendedPrice='Importe';
	var $saleID='Número de indentificación de Venta';
	var $orderFor='Venta por';
	/*Sale Receipt End*/


	/*Manage Sales Start*/
	var $searchForSale='Buscar por Venta (Por Rango de Número de indentificación de Venta)';
	var $searchedForSales='Buscado Ventas dentro';
	var $highID='#ID alto ';
	var $lowID='#ID bajo ';
	var $incorrectSearchFormat='Formato de busquedad incorrecto, favor de tratar de nuevo';
	var $updateRowID='Actualizar Número de indentificación de fila';
	var $updateSaleID='Actualizar Número de indentificación de Venta';
	var $itemsInSale='Artículos en Venta';
	var $itemTotalCost='Costo Total de Artículos';
	var $updateSale='Actualizar Venta';
	var $deleteEntireSale='Borrar Venta Entera';
	var $customerName='Nombre de Cliente';
	var $unitPrice='Precio por Unidad';
	/*Manage Sales End*/
	
	
	/*Config Start*/
	var $configurationWelcomeMessage='Bienvendio!&nbsp; Esta es la pantalla de Configuración de PHP Punto de Venta.&nbsp; Aqui puedes modificar informacion de la empresa, temas, y otras opciones.&nbsp;Campos en negrita son requeridos.';
    var $companyName='Nombre de Empresa';
    var $fax='Fax';
    var $website='Sitio de Internet';
    var $theme='Tema';
    var $taxRate='Impuesto';
    var $inPercent='en Porcentaje';
    var $currencySymbol='Symbolo de Moneda';
    var $barCodeMode='Modo de Códigos de Barra';
    var $language='Idioma';
	/*Config End*/
	
	
	/*Error Messages Start*/
	var $youDoNotHaveAnyDataInThe='No hay data adentro de ';
    var $attemptedSecurityBreech='Falla de Seguridad, no tienes autorizacion.';
    var $mustBeAdmin='Tienes que ser Administrador para ver esta página.';
    var $mustBeReportOrAdmin='Tienes que ser Administrador o Encargado de Reportes para ver esta página.';
    var $mustBeSalesClerkOrAdmin='Tienes que ser Administrador o Cajero para ver esta página.';
    var $youMustSelectAtLeastOneItem='Tienes que seleccionar por lo menos un Artículo';
    var $refreshAndTryAgain='Actualizar y tratar de nuevo';
	var $noActionSpecified='No hay acción especificada! No hay data agregada, cambiada, o borrada.';
	var $mustUseForm='Tienes que usar el formulario para agregar data.';
	var $forgottenFields='Falta uno o mas de los campos requeridos';
	var $passwordsDoNotMatch='Las Contraseñas no son iguales!';
	var $logoutConfirm='Seguro que quieres salir?';
	var $usernameOrPasswordIncorrect='Usuario o Contraseña son incorrectos';
	var $mustEnterNumeric='Hay que insertar un valor numérico para precio, porcentaje de impuesto, y candidad.';
	var $moreThan200='Hay mas que 200 filas en ';
	var $first200Displayed='tabla, se muestra solo las primeras 200 filas. Favor de usar la opcion de Buscar.';
	var $noDataInTable='No hay data en la';
	var $table='tabla';
	var $confirmDelete='Estas seguro que quieres borrar esto de la';
	var $invalidCharactor='Hay un carácter invalido en uno o mas de los campos, favor de presionar regresar y tratar de nuevo';
	var $didNotEnterID='No hay Número de indentificación';
	var $cantDeleteBrand='No se puede borrar esta marca porque esta en uso por algun artículo.';
	var $cantDeleteCategory='No se puede borrar esta Catagoría porque esta en uso por algun artículo.';
	var $cantDeleteCustomer='No se puede borrar este cliente porque esta en uso por algun artículo.';
	var $cantDeleteItem='No se puede borrar este artículo porque ha sido comprado por lo menos una vez.';
	var $cantDeleteSupplier='No se puede borrar este proveedor porque esta en uso por algun artículo.';
	var $cantDeleteUserLoggedIn='No se puede borrar este usuario porque actualmente esta ingresado al sistema!';
	var $cantDeleteUserEnteredSales='No se puede borrar este usuario porque ya tiene informaccion de ventas.';
	var $itemWithID='Artículo con Número de indentificación';
	var $isNotValid='no es válido.';
	var $customerWithID='Cliente con Número de indentificación';
	var $configUpdatedUnsucessfully='El archivo de configuración no fue actualizado, favor de asegurar que se puede escribir al archivo settings.php';
	var $problemConnectingToDB='Hubo un problema al conectar a la base de datos,<br> presionar regresar y verificar su configuración.';
	/*Error Messages End*/
    
    
    /*Success Messages Start*/
	var $upgradeMessage='Presionar ENVIAR para actualizar la base de datos a version  8.3.  Tienes que tener la version 7.0 o más nueva para actualizar Punto de Venta PHP.';
	var $upgradeSuccessfullMessage='La base de datos de Punto de Venta PHP ha sido actualizada con exito a la  version 8.3, favor de borrar los directorios de upgrade y install para tu seguridad.';
	var $successfullyAdded='Has aggregado con exito a la tabla';
	var $successfullyUpdated='Has actualizado con exito a la tabla';
	var $successfullyDeletedRow='Has borrado con exito a la fila';
	var $fromThe='de la';
	var $configUpdatedSuccessfully='El archivo de configuración fue actualizado con exito.';
	var $installSuccessfull='La instalación de Punto de Venta PHP fue exitoso,<br> favor de hacer clic <a href=../login.php>aqui</a> ingresar y empezar!';
	/*Success Messages End*/


	/*Installer Start*/
	var $installation='instalación';
	var $installerWelcomeMessage='Bienvenido al instalación por Punto de Venta PHP. Estamos complacidos que has escojido PHP POS como tu solucion de punto de venta.<br>&nbsp;&nbsp;&nbspnbsp;Para continuar el proceso de instalación,<br>&nbsp;&nbsp;&nbsp;&nbsp; favor de llenar el formato debajo y luego hacer clic en el botón \'Install\'.&nbsp;';
	var $databaseServer='Servidor de base de datos';
	var $databaseName='Nombre de base de datos';
	var $databaseUsername='Usuario de base de datos';
	var $databasePassword='Contraseña de base de datos';
	var $mustExist='tiene que existir';
	var $defaultTaxRate='Impuesto predeterminado';
	var $tablePrefix='Prefix de Tabla';
	var $numberToUseForBarcode='Caracter’stica a utilizar al explorar barcodes en la venta';
	var $whenYouFirstLogIn='Importante, cuando ingreses la primera vez tu usuario es';
	var $yourPasswordIs='tu contraseña es';
	var $install='Instalar';
	var $serious='Serio';
	var $bigBlue='Big Blue';
	var $percent='Porcentaje';
	/*Installer End*/
	
	
	/*Generic Start*/
    var $name='Nombre';
    var $customer='Cliente';
    var $employee='Empleado';
    var $date='Fecha';
    var $rowID='Identificación de fila';
    var $field='Campo';
	var $data='Data';
	var $quantityPurchased='Cantidad Comprada';
	var $listOf='Lista de';
	var $wo='sin';//without
	/*Generic End*/
    
}	

?>