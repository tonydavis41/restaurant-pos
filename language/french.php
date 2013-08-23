<?php
/*French Language File*/
/*Initial-Translator: Christophe Combelles <ccomb@free.fr>*/
class language
{
	/*Login Start*/
	var $login='Connexion';
    var $loginWelcomeMessage='Bienvenue sur le syst�me PHP Point Of Sale. Pour continuer, veuillez vous connecter en entrant ci-dessous votre nom d\'utilisateur et votre mot de passes.';
    var $username='Nom d\'utilisateur';
    var $password='Mot de passe';
    var $go='OK';
	/*Login End*/
	
		
	/*Menubar Start*/
    var $home='Accueil';
    var $customers='Clients';
    var $items='Articles';
    var $reports='Audit';
    var $sales='Ventes';
    var $config='Config';
    var $poweredBy='Fonctionne gr�ce �';
    var $welcome='Bienvenue';
    var $logout='D�connexion';
	/*Menubar End*/

	
	/*Home Start*/
	var $welcomeTo='Bienvenue sur';
	var $adminHomeWelcomeMessage='le syst�me de point de vente&nbsp;! Vous �tes connect� comme<br>administrateur.<br> Vous pouvez donc effectuer toutes les t�ches propos�es par ce syst�me.<br>Vous pouvez notamment choisir l\'une des t�ches d\'administration suivantes&nbsp;:';
    var $salesClerkHomeWelcomeMessage='le syst�me de point de vente&nbsp;! Pour commencer,<br>veuillez choisir l\'option Vente depuis le menu de navigation.';
    var $reportViewerHomeWelcomeMessage='le syst�me de point de vente&nbsp;! Pour commencer,<br>veuillez choisir l\'option Audit depuis le menu de navigation.';
    var $processSale='Traiter une vente';
    var $addRemoveManageUsers='Ajouter, effacer ou modifier des utilisateurs';
    var $addRemoveManageCustomers='Ajouter, effacer ou modifier des clients';
    var $addRemoveManageItems='Ajouter, effacer ou modifier des articles en vente';
    var $viewReports='Consulter des rapports';
    var $configureSettings='Configurer les param�tres du point de vente';
    var $viewOnlineSupport='Consulter le support en ligne';
	/*Home End*/
	
	
	/*Users Home Start*/
	var $createUser='Cr�er un utilisateur';
    var $manageUsers='Liste des utilisateurs';	
    /*Users Home End*/
	
	
	/*Users Form Start*/
	var $addUser='Ajout d\'un utilisateur';
	var $usedInLogin='utilis� pour la connexion';
    var $type='Type';
    var $admin='Admin';
    var $salesClerk='Vendeur';
    var $reportViewer='Auditeur';
    var $confirmPassword='Mot de passe (v�rif)';
	/*Users Form End*/


	/*Manage Users Start*/
	var $searchForUser='Chercher un utilisateur (par nom d\'utilisateur)';
    var $searchedForUser='Recherche par nom d\'utilisateur';
	var $deleteUser='Effacer un utilisateur';
    var $updateUser='Modifier un utilisateur';
	/*Manage Users End*/
	
	
	/*Customers Home Start*/
    var $customersWelcomeScreen='Bienvenue sur la page de gestion des clients&nbsp;! Vous pouvez ici modifier votre liste de clients. Vous devez ajouter au moins un client avant de traiter une vente. Que voulez-vous faire&nbsp;?';
    var $createNewCustomer='Ajouter un nouveau client';
    var $manageCustomers='Voir la liste des clients';
    var $customersBarcode='Codes barres des clients';
	/*Customers Home End*/
    
    
 	/*Customers Form Start*/
 	var $addCustomer='Ajout d\'un client';
    var $firstName='Pr�nom';
    var $lastName='Nom';
    var $accountNumber='n� de compte';
    var $phoneNumber='n� de t�l�phone';
    var $email='e-mail';
    var $streetAddress='adresse postale';
    var $commentsOrOther='Commentaires/Autre';
 	/*Customers Form End*/
 	
 	
 	/*Manage Customers Start*/
 	var $updateCustomer='Modifier un client';
    var $deleteCustomer='Effacer un client';
    var $searchForCustomer='Chercher un client (Par nom)';
    var $searchedForCustomer='Recherce de client';
	var $listOfCustomers='Liste des clients';
	/*Manage Customers End*/
	
	
	/*Items Home Start*/
    var $itemsWelcomeScreen='Bienvenue sur la page de gestion des articles. Vous pouvez ici modifier vos articles, vos marques,vos cat�gories et vos fournisseurs. Avant de traiter une vente, vous devez ajouter au moins une cat�gorie, une marque, un fournisseur et un article.<br>Que voulez-vous faire&nbsp;?';
    var $createNewItem='Ajouter un nouvel article';
    var $manageItems='Voir la liste des articles';
    var $itemsBarcode='Codes barres des articles';
    var $createBrand='Ajouter une nouvelle marque';
    var $manageBrands='Voir la liste des marques';
    var $createCategory='Ajouter une nouvelle cat�gorie';
    var $manageCategories='Voir la liste des cat�gories';
    var $createSupplier='Ajouter une nouveau fournisseur';
    var $manageSuppliers='Voir la liste des fournisseurs';
	/*Items Home End*/	
 	
 	
 	/*Items Form Start*/
 	var $itemName='Nom de l\'article';
    var $description='Description';
    var $itemNumber='n� d\'article';
    var $brand='marque';
    var $category='cat�gorie';
    var $supplier='fournisseur';
    var $buyingPrice='Prix d\'achat';
    var $sellingPrice='Prix de vente';
    var $tax='TVA';
    var $supplierCatalogue='n� catalogue fournisseur';
    var $quantityStock='Quantit� en stock';
 	var $users='utilisateurs';
    var $itemsInBoldRequired='les articles en gras sont obligatoires';
    var $update='Modifier';
    var $delete='D�truire';
    var $addItem='Ajouter';
    var $brandsCategoriesSupplierError='Vous devez cr�er au moins une marque, une cat�gorie et un fournisseur avant de cr�er un article.<br><a href=index.php>Retour aux articles</a>';
    var $finalSellingPricePerUnit='Prix de vente unitaire final';
	/*Items Form End*/
	
	
	/*Manage Items Start*/
	var $updateItem='Modifier un article';
    var $deleteItem='D�truire un article';
    var $searchForItem='Chercher un article (par nom)';
    var $searchedForItem='Recherche d\'article';
    var $listOfItems='Liste des articles';
    var $showOutOfStock='Voir les articles en rupture de stock';
    var $outOfStock='Articles en rupture de stock';
	/*Manage Items End*/
	
    
    /*Brands Form Start*/
    var $brandName='Nom de marque';
    var $addBrand='Ajouter une nouvelle marque';
	/*Brands Form End*/
    
    
    /*Manage Brands Start*/
    var $searchForBrand='Chercher une marque (par nom)';
    var $searchedForBrand='Recherche de marque';
    var $listOfBrands='Liste des marques';
    var $updateBrand='Modifier une marque';
    var $deleteBrand='D�truire une marque';
	/*Manage Brands End*/
    
    
    /*Categories Form Start*/
    var $categoryName='Nom de cat�gorie';
    var $addCategory='Ajouter une nouvelle cat�gorie';
	/*Categories Form End*/


    /*Manage Categories Start*/
	var $searchForCategory='Chercher une cat�gorie (par nom)';
    var $searchedForCategory='Recherche de cat�gorie';
    var $listOfCategories='Liste des cat�gories';
    var $updateCategory='Modifier une cat�gorie';
    var $deleteCategory='D�truire une cat�gorie';
    /*Manage Categories End*/
    
    
    /*Suppliers Form Start*/
    var $supplierName='Nom de fournisseur';
    var $address='Addresse';
    var $contact='Contact';
    var $other='Autre';
	/*Suppliers Form End*/


    /*Manage Suppliers Start*/
    var $listOfSuppliers='Liste des fournisseurs';
    var $searchForSupplier='Chercher un fournisseur (par nom)';
    var $searchedForSupplier='Recherche de fournisseur';
    var $addSupplier='Ajouter un nouveau fournisseur';
    var $updateSupplier='Modifier un fournisseur';
    var $deleteSupplier='D�truire un fournisseur';
    /*Manage Suppliers End*/


	/*Reports Home Start*/
	var $reportsWelcomeMessage='Bienvenue sur la page d\'audit&nbsp;! Vous pouvez ici consulter des rapports sur les ventes.<br>Lequel voulez-vous voir&nbsp;?';
    var $allCustomersReport='Rapport sur tous les clients';
    var $allEmployeesReport='Rapport sur tous les employ�s';
    var $allItemsReport='Rapport sur tous les articles';
    var $brandReport='Rapport De Marque';
    var $categoryReport='Rapport De Cat�gorie';
    var $customerReport='Rapport sur un client';
    var $dailyReport='Rapport journalier';
    var $dateRangeReport='Rapport sur une p�riode';
    var $employeeReport='Rapport sur un employ�';
    var $itemReport='Rapport sur un article';
    var $profitReport='Rapport de b�n�fice';
    var $taxReport='Rapport D\'Imp�ts';
	/*Reports Home End*/
	
	
	/*Input Needed Form Start*/
	var $inputNeeded='Donn�es n�cessaires pour';
    var $dateRange='p�riode';
    var $today='aujourd\'hui';
    var $yesterday='hier';
    var $last7days='les 7 derniers jours';
    var $lastMonth='le mois dernier';
    var $thisMonth='ce mois-ci';
    var $thisYear='cette ann�e';
    var $allTime='tout';
    var $findBrand='trouver un Marque';
    var $selectBrand='choisir un Marque';
    var $findCategory='trouver un Cat�gorie';
    var $selectCategory='choisir un Cat�gorie';
    var $findCustomer='trouver un client';
    var $selectCustomer='choisir un client';
    var $findEmployee='trouver un employ�';
    var $selectEmployee='choisir un employ�';
    var $findItem='trouver un article';
    var $selectItem='choisir un article';
    var $selectTax='choisir un Imp�t';
	/*Input Needed Form End*/
    
    
    /*"All" Reports Start*/
		
		/*All Customers Report Start*/
		var $itemsPurchased='articles achet�s';
   		var $moneySpentBeforeTax='d�pense HT';
    	var $moneySpentAfterTax='d�pense TTC';
		var $totalItemsPurchased='nombre d\'articles achet�s';
		/*All Customers Report End*/
		
		/*All Employees Report Start*/
		var $totalItemsSold='nombre d\'articles vendus';
    	var $moneySoldBeforeTax='Recette HT';
		var $moneySoldAfterTax='Recette TTC';
		/*All Employees Report End*/
		
		/*All Items Report Start*/
		var $numberPurchased='nombre d\'articles vendus';
   		var $subTotalForItem='Total HT';
        var $totalForItem='Total TTC';
		/*All Items Report End*/
	
	/*"All" Reports End*/
	
	
	/*Other Reports Start*/
	var $paidWith='paiement par';
    var $soldBy='Vendu par';
    var $saleDetails='d�tails de la vente';
    var $saleSubTotal='Total HT';
    var $saleTotalCost='Total TTC';
    var $showSaleDetails='Voir le d�tail';
    var $listOfSaleBy='Liste des ventes par';
    var $listOfSalesFor='Liste des ventes par';
    var $listOfSalesBetween='Liste des ventes<br>entre les dates';
    var $and='et';
    var $between='entre';
    var $totalWithOutTax='Total HT';
    var $totalWithTax='Total TTC';
	var $fromMonth='Depuis le mois';
    var $day='jour';
    var $year='ann�e';
    var $toMonth='jusqu\'�';
    var $totalAmountSoldWithOutTax='Total HT vendu';
    var $profit='B�n�fice';
    var $totalAmountSold='Total TTC vendu';
    var $totalProfit='B�n�fice total';
    var $totalsShownBetween='Totaux pour les ventes entre';
    var $totalItemCost='prix TTC';
	/*Other Reports End*/
		
		
	/*Sales Home Start*/
	var $salesWelcomeMessage='Bienvenue sur la page des ventes&nbsp;! Vous pouvez ici ajouter des ventes et les modifier. Que voulez-vous faire&nbsp;?';
    var $startSale='Enregistrer une nouvelle vente';
    var $manageSales='Voir la liste des ventes';
	/*Sales Home End*/
	
	
	/*Sale Interface Start*/
    var $yourShoppingCartIsEmpty='Votre vente actuelle est vide';
    var $addToCart='ajouter � la vente';
    var $clearSearch='vider la vente';
    var $saleComment='commentaire sur la vente';
    var $addSale='Enregistrer la vente';
    var $quantity='Quantit�';
    var $remove='enlever';
    var $cash='liquide';
	var $check='ch�que';
	var $credit='CB';
	var $giftCertificate='bon cadeau';
	var $account='compte';
	var $mustSelectCustomer='vous devez choisir un client';
	var $newSale='nouvelle vente';
	var $clearSale='vider la vente';
	var $newSaleBarcode='nouvelle vente par lecteur de code barre';
	var $scanInCustomer='scanner par client';
	var $scanInItem='scanner par article';
	var $shoppingCart='contenu de la vente';
	var $customerID='n� de client';
	var $itemID='n� d\'article';
	/*Sale Interface End*/
	
	
	/*Sale Receipt Start*/
	var $orderBy='command� par';
	var $itemOrdered='article command�';
	var $extendedPrice='prix TTC';
	var $saleID='n� de vente';
	var $orderFor='command� pour';
	/*Sale Receipt End*/


	/*Manage Sales Start*/
	var $searchForSale='Chercher une vente (par zone de n�)';
	var $searchedForSales='Recherche de ventes entre';
	var $highID='n�max';
	var $lowID='n�min';
	var $incorrectSearchFormat='Format de recherche incorrect. Veuillez r�essayer.';
	var $updateRowID='modifier le n� de ligne';
	var $updateSaleID='modifier le n� de vente';
	var $itemsInSale='articles en vente';
	var $itemTotalCost='prix TTC';
	var $updateSale='modifier la vente';
	var $deleteEntireSale='D�truire la vente enti�re';
	var $customerName='nom du client';
	var $unitPrice='prix unit.';
	/*Manage Sales End*/
	
	
	/*Config Start*/
	var $configurationWelcomeMessage='Bienvenue&nbsp;! Voici le paneau de configuration pour PHP Point of Sale. Vous pouvez ici modifier les informations sur votre soci�t�, les couleurs et d\'autres options. Les champs en gras sont obligatoires.';
    var $companyName='Soci�t�';
    var $fax='Fax';
    var $website='Site internet';
    var $theme='couleurs';
    var $taxRate='taux TVA';
    var $inPercent='en %';
    var $currencySymbol='symbole de monnaie';
    var $barCodeMode='mode de code barre';
    var $language='Langage';
	/*Config End*/
	
	
	/*Error Messages Start*/
	var $youDoNotHaveAnyDataInThe='Vous n\'avez aucune donn�e dans la';
    var $attemptedSecurityBreech='Tentative de fraude, vous n\'�tes pas un type d\'utilisateur connu.';
    var $mustBeAdmin='Vous devez �tre administrateur pour voir cette page.';
    var $mustBeReportOrAdmin='Vous devez �tre auditeur ou administrateur pour voir cette page.';
    var $mustBeSalesClerkOrAdmin='Vous devez �tre vendeur ou administrateur pour voir cette page.';
    var $youMustSelectAtLeastOneItem='Vous devez choisir au moins un article';
    var $refreshAndTryAgain='Rechargez la page et r�essayez';
	var $noActionSpecified='Aucune action sp�cifi�e&nbsp;! Aucune donn�e n\'a �t� ins�r�e, modifi�e ou effac�e.';
	var $mustUseForm='Vous devez utiliser le formulaire pour entrer des donn�es.';
	var $forgottenFields='Vous avez oubli� au moins un champ obligatoire';
	var $passwordsDoNotMatch='Vos mots de passe ne correspondent pas&nbsp;!';
	var $logoutConfirm='�tes-vous s�r de vouloir vous d�connecter&nbsp;?';
	var $usernameOrPasswordIncorrect='nom utilisateur ou mot de passe incorrect';
	var $mustEnterNumeric='Vous devez entrer un nombre pour le prix, le taux de TVA et la quantit�.';
	var $moreThan200='Il y a plus de 200 lignes dans le';
	var $first200Displayed='tableau, seules les 200 premi�res lignes sont affich�es. Vous devez utiliser la fonction de recherche.';
	var $noDataInTable='Il n\'y a aucune donn�e dans le';
	var $table='tableau';
	var $confirmDelete='�tes-vous s�r de vouloir effacer ceci du';
	var $invalidCharactor='Vous avez entr� un caract�re invalide dans un champ. Appuyez sur le bouton [retour] et r�essayez';
	var $didNotEnterID='Vous n\'avez pas entr� de num�ro';
	var $cantDeleteBrand='Vous ne pouvez pas d�truire cette marque car au moins un article l\'utilise.';
	var $cantDeleteCategory='Vous ne pouvez pas d�truire cette cat�gorie car au moins un article l\'utilise.';
	var $cantDeleteCustomer='Vous ne pouvez pas d�truire ce client car il a achet� au moins un article.';
	var $cantDeleteItem='Vous ne pouvez pas d�truire cet article car il a �t� achet� au moins une fois.';
	var $cantDeleteSupplier='Vous ne pouvez pas d�truire ce fournisseur car au moins un article l\'utilise.';
	var $cantDeleteUserLoggedIn='Vous ne pouvez pas d�truire un utilisateur connect�&nbsp;!';
	var $cantDeleteUserEnteredSales='Vous ne pouvez pas d�truire cet utilisateur car il a enregistr� au moins une vente.';
	var $itemWithID='l\'article n�';
	var $isNotValid='n\'existe pas.';
	var $customerWithID='le client n�';
	var $configUpdatedUnsucessfully='Le fichier de configuration n\'a pas �t� modifi�, assurez-vous d\'avoir la permission de modifier le fichier settings.php';
	var $problemConnectingToDB='Un probl�me de connexion � la base de donn�es est survenu,<br> cliquez sur le bouton [retour] et r�essayez.';
	/*Error Messages End*/
    
    
    /*Success Messages Start*/
	var $upgradeMessage='Si vous cliquez sur [valider], la base de donn�es sera mise � jour pour la version 8.3.  Vous devez avoir la version 7.0 au minimum pour faire la mise � jour de PHP Point Of Sale.';
	var $upgradeSuccessfullMessage='La base de donn�es de PHP Point Of Sale a �t� correctement mise � jour pour la version 8.3. Effacez le r�peroire de mise � jour et d\'installation pour des question de s�curit�.';
	var $successfullyAdded='Ajout r�ussi dans le tableau';
	var $successfullyUpdated='Modification r�ussie dans le tableau';
	var $successfullyDeletedRow='Effacement r�ussi dans le tableau';
	var $fromThe='depuis le';
	var $configUpdatedSuccessfully='Le fichier de configuration a �t� correctement modifi�';
	var $installSuccessfull='L\'installation de PHP Point Of Sale s\'est correctement d�roul�e.<br> Veuillez cliquer <a href=../login.php>ici</a> pour vous connecter et commencer&nbsp;!';
	/*Success Messages End*/


	/*Installer Start*/
	var $installation='Installation';
	var $installerWelcomeMessage='Bienvenue sur la page d\'installation de PHP Point of Sale. Nous vous remercions d\'avoir&nbsp;&nbsp;&nbsp;&nbsp; d�cid� d\'utiliser la solution PHP PoS.&nbsp;Pour continuer l\'installation,<br>&nbsp;&nbsp;&nbsp;&nbsp; veuillez remplir le formulaire ci-dessous puis cliquer sur le bouton [installer].&nbsp;';
	var $databaseServer='Serveur de base de donn�es';
	var $databaseName='nom de la base de donn�es';
	var $databaseUsername='nom d\'utilisateur pour la base de donn�es';
	var $databasePassword='mot de passe pour cet utilisateur';
	var $mustExist='Doit exister';
	var $defaultTaxRate='Taux de TVA par d�faut';
	var $tablePrefix='Pr�fixe des tables pour la DB';
	var $numberToUseForBarcode='Propri�t� � employer en balayant des barcodes � la vente';
	var $whenYouFirstLogIn='Important&nbsp;: � votre premi�re connexion, votre nom d\'utilisateur sera&nbsp;:';
	var $yourPasswordIs='et votre mot de passe sera&nbsp;:';
	var $install='Installer';
	var $serious='S�rieux';
	var $bigBlue='Grand bleu';
	var $percent='%';
	/*Installer End*/
	
	
	/*Generic Start*/
    var $name='Nom';
    var $customer='client';
    var $employee='employ�';
    var $date='Date';
    var $rowID='n� de ligne';
    var $field='champ';
	var $data='donn�es';
	var $quantityPurchased='quantit� achet�e';
	var $listOf='liste de';
	var $wo='sans';//without
	/*Generic End*/
    
}	

?>