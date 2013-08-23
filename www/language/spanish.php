<?php
/*Spanish Language File*/

class language
{
	/*Login Start*/
	var $login='Ingresar';
    var $loginWelcomeMessage='Bienvenido al sistema de Punto de Venta PHP. Para&nbsp; continuar, favor de ingresar usando tu nombre de usuario &nbsp; y contrase�a abajo.';
    var $username='Usuario';
    var $password='Contrase�a';
    var $go='Adelante!';
	/*Login End*/
	
		
	/*Menubar Start*/
    var $home='Inicio';
    var $customers='Clientes';
    var $items='Art�culos';
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
    var $salesClerkHomeWelcomeMessage='sistema de Punto de Venta! Para empezar,<br>favor de seleccionar la opci�n de Ventas del men�.';
    var $reportViewerHomeWelcomeMessage='sistema de Punto de Venta! Para empezar,<br>favor de seleccionar la opci�n de Reportes del men�.';
    var $processSale='Hacer una Venta';
    var $addRemoveManageUsers='Agregar, Borrar, o Administrar Usuarios';
    var $addRemoveManageCustomers='Agregar, Borrar, o Administrar Clientes';
    var $addRemoveManageItems='Agregar, Borrar, o Administrar Art�culos';
    var $viewReports='Ver Reportes';
    var $configureSettings='Configurar Punto de Venta';
    var $viewOnlineSupport='Ver Apoyo T�cnico en l�nea';
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
    var $confirmPassword='Confirmar Contrase�a';
	/*Users Form End*/


	/*Manage Users Start*/
	var $searchForUser='Buscar por Usuario (Por Nombre de Usuario)';
    var $searchedForUser='Buscado por Nombre de Usuario';
	var $deleteUser='Borrar Usuario';
    var $updateUser='Actualizar Usuario';
	/*Manage Users End*/
	
	
	/*Customers Home Start*/
    var $customersWelcomeScreen='Bienvenido a la pantalla de Clientes!&nbsp;Aqui puedes administrar tu base de clientes.&nbsp;Tienes que agregar un cliente antes de hacer una venta. <br>�Qu� quieres hacer?';
    var $createNewCustomer='Crear un Cliente nuevo';
    var $manageCustomers='Administar Clientes';
    var $customersBarcode='Hoja de C�digos de Barra de Clientes';
	/*Customers Home End*/
    
    
 	/*Customers Form Start*/
 	var $addCustomer='Agregar Cliente';
    var $firstName='Nombre';
    var $lastName='Apellido';
    var $accountNumber='N�mero de Cuenta';
    var $phoneNumber='Tel�fono';
    var $email='Correo Electr�nico';
    var $streetAddress='Direcci�n';
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
    var $itemsWelcomeScreen='Bienvenido a la pantalla de Art�culos.&nbsp; Aqui puedes administrar Art�culos, Marcas, Catagor�as, y Proveedores.&nbsp; Antes de hacer una venta, necesitas agregar por lo menos una Catagor�a, una marca, un proveedor, y un art�culo.&nbsp;<br>�Qu� quieres hacer?';
    var $createNewItem='Crear un Art�culo Nuevo';
    var $manageItems='Administrar Art�culos';
    var $itemsBarcode='Hoja de C�digos de Barra de Art�culos';
    var $createBrand='Crear una Nueva Marca';
    var $manageBrands='Administar Marcas';
    var $createCategory='Crear una Catagor�a Nueva';
    var $manageCategories='Administar Catagor�as';
    var $createSupplier='Crear un Proveedor Nuevo';
    var $manageSuppliers='Administar Proveedores';
	/*Items Home End*/	
 	
 	
 	/*Items Form Start*/
 	var $itemName='Nombre de Art�culo';
    var $description='Descripcion';
    var $itemNumber='N�mero de Art�culo';
    var $brand='Marca';
    var $category='Categoria';
    var $supplier='Proveedor';
    var $buyingPrice='Costo';
    var $sellingPrice='Precio de Venta';
    var $tax='Impuesto';
    var $supplierCatalogue='N�mero del Cat�logo de Proveedor';
    var $quantityStock='Cantidad en Existencia';
 	var $users='Usuarios';
    var $itemsInBoldRequired='Se Requieren los Campos en Negrita';
    var $update='Actualizar';
    var $delete='Borrar';
    var $addItem='Agregar Art�culo';
    var $brandsCategoriesSupplierError='Tienes que crear Marcas, Catagor�as, y Proveedores antes de crear un Art�culo<br><a href=index.php>Regresar a Pantalla de Art�culos</a>';
    var $finalSellingPricePerUnit='Precio Final por Unidad';
	/*Items Form End*/
	
	
	/*Manage Items Start*/
	var $updateItem='Actualizar Art�culo';
    var $deleteItem='Borrar Art�culo';
    var $searchForItem='Buscar por Art�culo (Por Nombre de Art�culo)';
    var $searchedForItem='Buscado por Art�culo';
    var $listOfItems='Lista de Art�culos';
    var $showOutOfStock='Mostrar Art�culos sin Existencias';
    var $outOfStock='Art�culos sin Existencias';
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
    var $categoryName='Nombre de Catagor�a';
    var $addCategory='Agregar Categoria';
	/*Categories Form End*/


    /*Manage Categories Start*/
	var $searchForCategory='Buscar por Categoria (Por nombre de Catagor�a)';
    var $searchedForCategory='Buscado por Categoria';
    var $listOfCategories='Lista de Categorias';
    var $updateCategory='Actualizar Categoria';
    var $deleteCategory='Borrar Categoria';
    /*Manage Categories End*/
    
    
    /*Suppliers Form Start*/
    var $supplierName='Nombre de Proveedor';
    var $address='Direcci�n';
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
	var $reportsWelcomeMessage='Bienvenio a la pantalla de Reportes!&nbsp; Aqui puedes ver reportes basados en ventas.&nbsp;<br>�Qu� quieres hacer?';
    var $allCustomersReport='Reporte de Todos los Clientes';
    var $allEmployeesReport='Reporte de Todos los Empleados';
    var $allItemsReport='Reporte de Todos los Art�culos';
    var $brandReport='Informe De la Marca de f�brica';
    var $categoryReport='Informe De la Categor�a';
    var $customerReport='Reporte de Clientes';
    var $dailyReport='Reporte Diario';
    var $dateRangeReport='Reporte de Rango de Fechas';
    var $employeeReport='Reporte de Empleados';
    var $itemReport='Reporte de Art�culos';
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
    var $thisYear='A�o Actual';
    var $allTime='Todo el tiempo';
    var $findBrand='Buscar Marca de f�brica';
    var $selectBrand='Seleccionar Marca de f�brica';
    var $findCategory='Buscar Categor�a';
    var $selectCategory='Seleccionar Categor�a';
    var $findCustomer='Buscar Cliente';
    var $selectCustomer='Seleccionar Cliente';
    var $findEmployee='Buscar Empleado';
    var $selectEmployee='Seleccionar Empleado';
    var $findItem='Buscar Art�culo';
    var $selectItem='Seleccionar Art�culo';
    var $selectTax='Seleccionar Impuesto';
	/*Input Needed Form End*/
    
    
    /*"All" Reports Start*/
		
		/*All Customers Report Start*/
		var $itemsPurchased='Art�culos Comprados';
   		var $moneySpentBeforeTax='Compras excluyendo impuestos';
    	var $moneySpentAfterTax='Compras incluyendo impuestos';
		var $totalItemsPurchased='Total de Art�culos Comprados';
		/*All Customers Report End*/
		
		/*All Employees Report Start*/
		var $totalItemsSold='Total de Art�culos Vendidos';
    	var $moneySoldBeforeTax='Ventas excluyendo Impuestos';
		var $moneySoldAfterTax='Ventas incluyendo impuestos';
		/*All Employees Report End*/
		
		/*All Items Report Start*/
		var $numberPurchased='N�mero Comprado';
   		var $subTotalForItem='Subtotal por Art�culo';
        var $totalForItem='Total por Art�culo';
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
    var $year='A�o';
    var $toMonth='Hasta Mes';
    var $totalAmountSoldWithOutTax='Total de Ventas (sin Impuestos)';
    var $profit='Utilidad';
    var $totalAmountSold='Total de Ventas';
    var $totalProfit='Total de Utilidades';
    var $totalsShownBetween='Totales por ventas entre';
    var $totalItemCost='Total de Costo de Art�culo';
	/*Other Reports End*/
		
		
	/*Sales Home Start*/
	var $salesWelcomeMessage='Bienvenido a la pantalla de Ventas!&nbsp; Aqui puedes crear ventas y administrar las.&nbsp; �Qu� quieres hacer?';
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
	var $giftCertificate='Cup�n';
	var $account='Cuenta';
	var $mustSelectCustomer='Tienes que seleccionar un cliente';
	var $newSale='Venta Nueva';
	var $clearSale='Borrar Venta';
	var $newSaleBarcode='Venta Nueva con scanner de C�digos de barra';
	var $scanInCustomer='Leer C�digo de Cliente ';
	var $scanInItem='Leer C�digo de Articlo';
	var $shoppingCart='Venta';
	var $customerID='N�mero de indentificaci�n de Cliente';
	var $itemID='N�mero de indentificaci�n de Art�culo';
	/*Sale Interface End*/
	
	
	/*Sale Receipt Start*/
	var $orderBy='Venta a';
	var $itemOrdered='Art�culo vendido';
	var $extendedPrice='Importe';
	var $saleID='N�mero de indentificaci�n de Venta';
	var $orderFor='Venta por';
	/*Sale Receipt End*/


	/*Manage Sales Start*/
	var $searchForSale='Buscar por Venta (Por Rango de N�mero de indentificaci�n de Venta)';
	var $searchedForSales='Buscado Ventas dentro';
	var $highID='#ID alto ';
	var $lowID='#ID bajo ';
	var $incorrectSearchFormat='Formato de busquedad incorrecto, favor de tratar de nuevo';
	var $updateRowID='Actualizar N�mero de indentificaci�n de fila';
	var $updateSaleID='Actualizar N�mero de indentificaci�n de Venta';
	var $itemsInSale='Art�culos en Venta';
	var $itemTotalCost='Costo Total de Art�culos';
	var $updateSale='Actualizar Venta';
	var $deleteEntireSale='Borrar Venta Entera';
	var $customerName='Nombre de Cliente';
	var $unitPrice='Precio por Unidad';
	/*Manage Sales End*/
	
	
	/*Config Start*/
	var $configurationWelcomeMessage='Bienvendio!&nbsp; Esta es la pantalla de Configuraci�n de PHP Punto de Venta.&nbsp; Aqui puedes modificar informacion de la empresa, temas, y otras opciones.&nbsp;Campos en negrita son requeridos.';
    var $companyName='Nombre de Empresa';
    var $fax='Fax';
    var $website='Sitio de Internet';
    var $theme='Tema';
    var $taxRate='Impuesto';
    var $inPercent='en Porcentaje';
    var $currencySymbol='Symbolo de Moneda';
    var $barCodeMode='Modo de C�digos de Barra';
    var $language='Idioma';
	/*Config End*/
	
	
	/*Error Messages Start*/
	var $youDoNotHaveAnyDataInThe='No hay data adentro de ';
    var $attemptedSecurityBreech='Falla de Seguridad, no tienes autorizacion.';
    var $mustBeAdmin='Tienes que ser Administrador para ver esta p�gina.';
    var $mustBeReportOrAdmin='Tienes que ser Administrador o Encargado de Reportes para ver esta p�gina.';
    var $mustBeSalesClerkOrAdmin='Tienes que ser Administrador o Cajero para ver esta p�gina.';
    var $youMustSelectAtLeastOneItem='Tienes que seleccionar por lo menos un Art�culo';
    var $refreshAndTryAgain='Actualizar y tratar de nuevo';
	var $noActionSpecified='No hay acci�n especificada! No hay data agregada, cambiada, o borrada.';
	var $mustUseForm='Tienes que usar el formulario para agregar data.';
	var $forgottenFields='Falta uno o mas de los campos requeridos';
	var $passwordsDoNotMatch='Las Contrase�as no son iguales!';
	var $logoutConfirm='Seguro que quieres salir?';
	var $usernameOrPasswordIncorrect='Usuario o Contrase�a son incorrectos';
	var $mustEnterNumeric='Hay que insertar un valor num�rico para precio, porcentaje de impuesto, y candidad.';
	var $moreThan200='Hay mas que 200 filas en ';
	var $first200Displayed='tabla, se muestra solo las primeras 200 filas. Favor de usar la opcion de Buscar.';
	var $noDataInTable='No hay data en la';
	var $table='tabla';
	var $confirmDelete='Estas seguro que quieres borrar esto de la';
	var $invalidCharactor='Hay un car�cter invalido en uno o mas de los campos, favor de presionar regresar y tratar de nuevo';
	var $didNotEnterID='No hay N�mero de indentificaci�n';
	var $cantDeleteBrand='No se puede borrar esta marca porque esta en uso por algun art�culo.';
	var $cantDeleteCategory='No se puede borrar esta Catagor�a porque esta en uso por algun art�culo.';
	var $cantDeleteCustomer='No se puede borrar este cliente porque esta en uso por algun art�culo.';
	var $cantDeleteItem='No se puede borrar este art�culo porque ha sido comprado por lo menos una vez.';
	var $cantDeleteSupplier='No se puede borrar este proveedor porque esta en uso por algun art�culo.';
	var $cantDeleteUserLoggedIn='No se puede borrar este usuario porque actualmente esta ingresado al sistema!';
	var $cantDeleteUserEnteredSales='No se puede borrar este usuario porque ya tiene informaccion de ventas.';
	var $itemWithID='Art�culo con N�mero de indentificaci�n';
	var $isNotValid='no es v�lido.';
	var $customerWithID='Cliente con N�mero de indentificaci�n';
	var $configUpdatedUnsucessfully='El archivo de configuraci�n no fue actualizado, favor de asegurar que se puede escribir al archivo settings.php';
	var $problemConnectingToDB='Hubo un problema al conectar a la base de datos,<br> presionar regresar y verificar su configuraci�n.';
	/*Error Messages End*/
    
    
    /*Success Messages Start*/
	var $upgradeMessage='Presionar ENVIAR para actualizar la base de datos a version  8.3.  Tienes que tener la version 7.0 o m�s nueva para actualizar Punto de Venta PHP.';
	var $upgradeSuccessfullMessage='La base de datos de Punto de Venta PHP ha sido actualizada con exito a la  version 8.3, favor de borrar los directorios de upgrade y install para tu seguridad.';
	var $successfullyAdded='Has aggregado con exito a la tabla';
	var $successfullyUpdated='Has actualizado con exito a la tabla';
	var $successfullyDeletedRow='Has borrado con exito a la fila';
	var $fromThe='de la';
	var $configUpdatedSuccessfully='El archivo de configuraci�n fue actualizado con exito.';
	var $installSuccessfull='La instalaci�n de Punto de Venta PHP fue exitoso,<br> favor de hacer clic <a href=../login.php>aqui</a> ingresar y empezar!';
	/*Success Messages End*/


	/*Installer Start*/
	var $installation='instalaci�n';
	var $installerWelcomeMessage='Bienvenido al instalaci�n por Punto de Venta PHP. Estamos complacidos que has escojido PHP POS como tu solucion de punto de venta.<br>&nbsp;&nbsp;&nbspnbsp;Para continuar el proceso de instalaci�n,<br>&nbsp;&nbsp;&nbsp;&nbsp; favor de llenar el formato debajo y luego hacer clic en el bot�n \'Install\'.&nbsp;';
	var $databaseServer='Servidor de base de datos';
	var $databaseName='Nombre de base de datos';
	var $databaseUsername='Usuario de base de datos';
	var $databasePassword='Contrase�a de base de datos';
	var $mustExist='tiene que existir';
	var $defaultTaxRate='Impuesto predeterminado';
	var $tablePrefix='Prefix de Tabla';
	var $numberToUseForBarcode='Caracter�stica a utilizar al explorar barcodes en la venta';
	var $whenYouFirstLogIn='Importante, cuando ingreses la primera vez tu usuario es';
	var $yourPasswordIs='tu contrase�a es';
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
    var $rowID='Identificaci�n de fila';
    var $field='Campo';
	var $data='Data';
	var $quantityPurchased='Cantidad Comprada';
	var $listOf='Lista de';
	var $wo='sin';//without
	/*Generic End*/
    
}	

?>