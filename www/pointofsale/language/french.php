<?php
/*French Language File*/
/*Initial-Translator: Christophe Combelles <ccomb@free.fr>*/
class language
{
	/*Login Start*/
	var $login='Connexion';
    var $loginWelcomeMessage='Bienvenue sur le système PHP Point Of Sale. Pour continuer, veuillez vous connecter en entrant ci-dessous votre nom d\'utilisateur et votre mot de passes.';
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
    var $poweredBy='Fonctionne grâce à';
    var $welcome='Bienvenue';
    var $logout='Déconnexion';
	/*Menubar End*/

	
	/*Home Start*/
	var $welcomeTo='Bienvenue sur';
	var $adminHomeWelcomeMessage='le système de point de vente&nbsp;! Vous êtes connecté comme<br>administrateur.<br> Vous pouvez donc effectuer toutes les tâches proposées par ce système.<br>Vous pouvez notamment choisir l\'une des tâches d\'administration suivantes&nbsp;:';
    var $salesClerkHomeWelcomeMessage='le système de point de vente&nbsp;! Pour commencer,<br>veuillez choisir l\'option Vente depuis le menu de navigation.';
    var $reportViewerHomeWelcomeMessage='le système de point de vente&nbsp;! Pour commencer,<br>veuillez choisir l\'option Audit depuis le menu de navigation.';
    var $processSale='Traiter une vente';
    var $addRemoveManageUsers='Ajouter, effacer ou modifier des utilisateurs';
    var $addRemoveManageCustomers='Ajouter, effacer ou modifier des clients';
    var $addRemoveManageItems='Ajouter, effacer ou modifier des articles en vente';
    var $viewReports='Consulter des rapports';
    var $configureSettings='Configurer les paramètres du point de vente';
    var $viewOnlineSupport='Consulter le support en ligne';
	/*Home End*/
	
	
	/*Users Home Start*/
	var $createUser='Créer un utilisateur';
    var $manageUsers='Liste des utilisateurs';	
    /*Users Home End*/
	
	
	/*Users Form Start*/
	var $addUser='Ajout d\'un utilisateur';
	var $usedInLogin='utilisé pour la connexion';
    var $type='Type';
    var $admin='Admin';
    var $salesClerk='Vendeur';
    var $reportViewer='Auditeur';
    var $confirmPassword='Mot de passe (vérif)';
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
    var $firstName='Prénom';
    var $lastName='Nom';
    var $accountNumber='n° de compte';
    var $phoneNumber='n° de téléphone';
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
    var $itemsWelcomeScreen='Bienvenue sur la page de gestion des articles. Vous pouvez ici modifier vos articles, vos marques,vos catégories et vos fournisseurs. Avant de traiter une vente, vous devez ajouter au moins une catégorie, une marque, un fournisseur et un article.<br>Que voulez-vous faire&nbsp;?';
    var $createNewItem='Ajouter un nouvel article';
    var $manageItems='Voir la liste des articles';
    var $itemsBarcode='Codes barres des articles';
    var $createBrand='Ajouter une nouvelle marque';
    var $manageBrands='Voir la liste des marques';
    var $createCategory='Ajouter une nouvelle catégorie';
    var $manageCategories='Voir la liste des catégories';
    var $createSupplier='Ajouter une nouveau fournisseur';
    var $manageSuppliers='Voir la liste des fournisseurs';
	/*Items Home End*/	
 	
 	
 	/*Items Form Start*/
 	var $itemName='Nom de l\'article';
    var $description='Description';
    var $itemNumber='n° d\'article';
    var $brand='marque';
    var $category='catégorie';
    var $supplier='fournisseur';
    var $buyingPrice='Prix d\'achat';
    var $sellingPrice='Prix de vente';
    var $tax='TVA';
    var $supplierCatalogue='n° catalogue fournisseur';
    var $quantityStock='Quantité en stock';
 	var $users='utilisateurs';
    var $itemsInBoldRequired='les articles en gras sont obligatoires';
    var $update='Modifier';
    var $delete='Détruire';
    var $addItem='Ajouter';
    var $brandsCategoriesSupplierError='Vous devez créer au moins une marque, une catégorie et un fournisseur avant de créer un article.<br><a href=index.php>Retour aux articles</a>';
    var $finalSellingPricePerUnit='Prix de vente unitaire final';
	/*Items Form End*/
	
	
	/*Manage Items Start*/
	var $updateItem='Modifier un article';
    var $deleteItem='Détruire un article';
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
    var $deleteBrand='Détruire une marque';
	/*Manage Brands End*/
    
    
    /*Categories Form Start*/
    var $categoryName='Nom de catégorie';
    var $addCategory='Ajouter une nouvelle catégorie';
	/*Categories Form End*/


    /*Manage Categories Start*/
	var $searchForCategory='Chercher une catégorie (par nom)';
    var $searchedForCategory='Recherche de catégorie';
    var $listOfCategories='Liste des catégories';
    var $updateCategory='Modifier une catégorie';
    var $deleteCategory='Détruire une catégorie';
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
    var $deleteSupplier='Détruire un fournisseur';
    /*Manage Suppliers End*/


	/*Reports Home Start*/
	var $reportsWelcomeMessage='Bienvenue sur la page d\'audit&nbsp;! Vous pouvez ici consulter des rapports sur les ventes.<br>Lequel voulez-vous voir&nbsp;?';
    var $allCustomersReport='Rapport sur tous les clients';
    var $allEmployeesReport='Rapport sur tous les employés';
    var $allItemsReport='Rapport sur tous les articles';
    var $brandReport='Rapport De Marque';
    var $categoryReport='Rapport De CatŽgorie';
    var $customerReport='Rapport sur un client';
    var $dailyReport='Rapport journalier';
    var $dateRangeReport='Rapport sur une période';
    var $employeeReport='Rapport sur un employé';
    var $itemReport='Rapport sur un article';
    var $profitReport='Rapport de bénéfice';
    var $taxReport='Rapport D\'Imp™ts';
	/*Reports Home End*/
	
	
	/*Input Needed Form Start*/
	var $inputNeeded='Données nécessaires pour';
    var $dateRange='période';
    var $today='aujourd\'hui';
    var $yesterday='hier';
    var $last7days='les 7 derniers jours';
    var $lastMonth='le mois dernier';
    var $thisMonth='ce mois-ci';
    var $thisYear='cette année';
    var $allTime='tout';
    var $findBrand='trouver un Marque';
    var $selectBrand='choisir un Marque';
    var $findCategory='trouver un CatŽgorie';
    var $selectCategory='choisir un CatŽgorie';
    var $findCustomer='trouver un client';
    var $selectCustomer='choisir un client';
    var $findEmployee='trouver un employé';
    var $selectEmployee='choisir un employé';
    var $findItem='trouver un article';
    var $selectItem='choisir un article';
    var $selectTax='choisir un Imp™t';
	/*Input Needed Form End*/
    
    
    /*"All" Reports Start*/
		
		/*All Customers Report Start*/
		var $itemsPurchased='articles achetés';
   		var $moneySpentBeforeTax='dépense HT';
    	var $moneySpentAfterTax='dépense TTC';
		var $totalItemsPurchased='nombre d\'articles achetés';
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
    var $saleDetails='détails de la vente';
    var $saleSubTotal='Total HT';
    var $saleTotalCost='Total TTC';
    var $showSaleDetails='Voir le détail';
    var $listOfSaleBy='Liste des ventes par';
    var $listOfSalesFor='Liste des ventes par';
    var $listOfSalesBetween='Liste des ventes<br>entre les dates';
    var $and='et';
    var $between='entre';
    var $totalWithOutTax='Total HT';
    var $totalWithTax='Total TTC';
	var $fromMonth='Depuis le mois';
    var $day='jour';
    var $year='année';
    var $toMonth='jusqu\'à';
    var $totalAmountSoldWithOutTax='Total HT vendu';
    var $profit='Bénéfice';
    var $totalAmountSold='Total TTC vendu';
    var $totalProfit='Bénéfice total';
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
    var $addToCart='ajouter à la vente';
    var $clearSearch='vider la vente';
    var $saleComment='commentaire sur la vente';
    var $addSale='Enregistrer la vente';
    var $quantity='Quantité';
    var $remove='enlever';
    var $cash='liquide';
	var $check='chèque';
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
	var $customerID='n° de client';
	var $itemID='n° d\'article';
	/*Sale Interface End*/
	
	
	/*Sale Receipt Start*/
	var $orderBy='commandé par';
	var $itemOrdered='article commandé';
	var $extendedPrice='prix TTC';
	var $saleID='n° de vente';
	var $orderFor='commandé pour';
	/*Sale Receipt End*/


	/*Manage Sales Start*/
	var $searchForSale='Chercher une vente (par zone de n°)';
	var $searchedForSales='Recherche de ventes entre';
	var $highID='n°max';
	var $lowID='n°min';
	var $incorrectSearchFormat='Format de recherche incorrect. Veuillez réessayer.';
	var $updateRowID='modifier le n° de ligne';
	var $updateSaleID='modifier le n° de vente';
	var $itemsInSale='articles en vente';
	var $itemTotalCost='prix TTC';
	var $updateSale='modifier la vente';
	var $deleteEntireSale='Détruire la vente entière';
	var $customerName='nom du client';
	var $unitPrice='prix unit.';
	/*Manage Sales End*/
	
	
	/*Config Start*/
	var $configurationWelcomeMessage='Bienvenue&nbsp;! Voici le paneau de configuration pour PHP Point of Sale. Vous pouvez ici modifier les informations sur votre société, les couleurs et d\'autres options. Les champs en gras sont obligatoires.';
    var $companyName='Société';
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
	var $youDoNotHaveAnyDataInThe='Vous n\'avez aucune donnée dans la';
    var $attemptedSecurityBreech='Tentative de fraude, vous n\'êtes pas un type d\'utilisateur connu.';
    var $mustBeAdmin='Vous devez être administrateur pour voir cette page.';
    var $mustBeReportOrAdmin='Vous devez être auditeur ou administrateur pour voir cette page.';
    var $mustBeSalesClerkOrAdmin='Vous devez être vendeur ou administrateur pour voir cette page.';
    var $youMustSelectAtLeastOneItem='Vous devez choisir au moins un article';
    var $refreshAndTryAgain='Rechargez la page et réessayez';
	var $noActionSpecified='Aucune action spécifiée&nbsp;! Aucune donnée n\'a été insérée, modifiée ou effacée.';
	var $mustUseForm='Vous devez utiliser le formulaire pour entrer des données.';
	var $forgottenFields='Vous avez oublié au moins un champ obligatoire';
	var $passwordsDoNotMatch='Vos mots de passe ne correspondent pas&nbsp;!';
	var $logoutConfirm='Êtes-vous sûr de vouloir vous déconnecter&nbsp;?';
	var $usernameOrPasswordIncorrect='nom utilisateur ou mot de passe incorrect';
	var $mustEnterNumeric='Vous devez entrer un nombre pour le prix, le taux de TVA et la quantité.';
	var $moreThan200='Il y a plus de 200 lignes dans le';
	var $first200Displayed='tableau, seules les 200 premières lignes sont affichées. Vous devez utiliser la fonction de recherche.';
	var $noDataInTable='Il n\'y a aucune donnée dans le';
	var $table='tableau';
	var $confirmDelete='Êtes-vous sûr de vouloir effacer ceci du';
	var $invalidCharactor='Vous avez entré un caractère invalide dans un champ. Appuyez sur le bouton [retour] et réessayez';
	var $didNotEnterID='Vous n\'avez pas entré de numéro';
	var $cantDeleteBrand='Vous ne pouvez pas détruire cette marque car au moins un article l\'utilise.';
	var $cantDeleteCategory='Vous ne pouvez pas détruire cette catégorie car au moins un article l\'utilise.';
	var $cantDeleteCustomer='Vous ne pouvez pas détruire ce client car il a acheté au moins un article.';
	var $cantDeleteItem='Vous ne pouvez pas détruire cet article car il a été acheté au moins une fois.';
	var $cantDeleteSupplier='Vous ne pouvez pas détruire ce fournisseur car au moins un article l\'utilise.';
	var $cantDeleteUserLoggedIn='Vous ne pouvez pas détruire un utilisateur connecté&nbsp;!';
	var $cantDeleteUserEnteredSales='Vous ne pouvez pas détruire cet utilisateur car il a enregistré au moins une vente.';
	var $itemWithID='l\'article n°';
	var $isNotValid='n\'existe pas.';
	var $customerWithID='le client n°';
	var $configUpdatedUnsucessfully='Le fichier de configuration n\'a pas été modifié, assurez-vous d\'avoir la permission de modifier le fichier settings.php';
	var $problemConnectingToDB='Un problème de connexion à la base de données est survenu,<br> cliquez sur le bouton [retour] et réessayez.';
	/*Error Messages End*/
    
    
    /*Success Messages Start*/
	var $upgradeMessage='Si vous cliquez sur [valider], la base de données sera mise à jour pour la version 8.3.  Vous devez avoir la version 7.0 au minimum pour faire la mise à jour de PHP Point Of Sale.';
	var $upgradeSuccessfullMessage='La base de données de PHP Point Of Sale a été correctement mise à jour pour la version 8.3. Effacez le réperoire de mise à jour et d\'installation pour des question de sécurité.';
	var $successfullyAdded='Ajout réussi dans le tableau';
	var $successfullyUpdated='Modification réussie dans le tableau';
	var $successfullyDeletedRow='Effacement réussi dans le tableau';
	var $fromThe='depuis le';
	var $configUpdatedSuccessfully='Le fichier de configuration a été correctement modifié';
	var $installSuccessfull='L\'installation de PHP Point Of Sale s\'est correctement déroulée.<br> Veuillez cliquer <a href=../login.php>ici</a> pour vous connecter et commencer&nbsp;!';
	/*Success Messages End*/


	/*Installer Start*/
	var $installation='Installation';
	var $installerWelcomeMessage='Bienvenue sur la page d\'installation de PHP Point of Sale. Nous vous remercions d\'avoir&nbsp;&nbsp;&nbsp;&nbsp; décidé d\'utiliser la solution PHP PoS.&nbsp;Pour continuer l\'installation,<br>&nbsp;&nbsp;&nbsp;&nbsp; veuillez remplir le formulaire ci-dessous puis cliquer sur le bouton [installer].&nbsp;';
	var $databaseServer='Serveur de base de données';
	var $databaseName='nom de la base de données';
	var $databaseUsername='nom d\'utilisateur pour la base de données';
	var $databasePassword='mot de passe pour cet utilisateur';
	var $mustExist='Doit exister';
	var $defaultTaxRate='Taux de TVA par défaut';
	var $tablePrefix='Préfixe des tables pour la DB';
	var $numberToUseForBarcode='PropriŽtŽ ˆ employer en balayant des barcodes ˆ la vente';
	var $whenYouFirstLogIn='Important&nbsp;: à votre première connexion, votre nom d\'utilisateur sera&nbsp;:';
	var $yourPasswordIs='et votre mot de passe sera&nbsp;:';
	var $install='Installer';
	var $serious='Sérieux';
	var $bigBlue='Grand bleu';
	var $percent='%';
	/*Installer End*/
	
	
	/*Generic Start*/
    var $name='Nom';
    var $customer='client';
    var $employee='employé';
    var $date='Date';
    var $rowID='n° de ligne';
    var $field='champ';
	var $data='données';
	var $quantityPurchased='quantité achetée';
	var $listOf='liste de';
	var $wo='sans';//without
	/*Generic End*/
    
}	

?>