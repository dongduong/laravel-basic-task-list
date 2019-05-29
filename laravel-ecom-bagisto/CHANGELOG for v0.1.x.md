# CHANGELOG for v0.1.x

#### This changelog consists the bug & security fixes and new features being included in the releases listed below.

## **v0.1.5(15th of March, 2019)** - *Release*

* [feature] - Category display mode.

* [feature] - Color swatches for product.

* [feature] - Cross sell and Up sell suggestions.

* [feature] - Faster search, faster product load on storefront, Product API for fetching with numerous attributes filter.

* [feature] - Added translations for Arabic and Brazilian languages(thanks to @cgartner-redstage).

* #633 [fixed] - Fixed database custom port issue in installer issue (thanks to @abdulhamid-alattar)

* #652 [fixed] - Removed black bar in admin panel.

* #676 [fixed] - Can't filter by ID.

* #671 [fixed] - Having these errors Undefined variable: key/value.

* #669 [fixed] - Product list view not working in demo.

* #664 [fixed] - CSS issues

* #646 [fixed] - Warning: array_combine() expects parameter 1 to be array, null given ( install.php on line 32 )

* #639 [fixed] - Broken link of image, on edit page of attribute in case of Swatch Type "Image" when editing first time.

* #642 [fixed] - Getting exception on search in Products, Categories, Shipments & Product Reviews datagrids.

* #636 [fixed] - Getting exception in shipment grid.

* #621 [Added] - Add a column in product grid to identify the attribute family used for creating that product.

* #620 [fixed] - "Enter Key" is not working while searching the product.

* #619 [fixed] - Getting Exception when clicking on Product for which data is set according to locale.

* #618 [fixed] - Layout issue on Changing Locale.

* #617 [fixed] - Getting Exception in case of Guest Review on frontend.

* #616 [fixed] - Getting error message that tax rate field is required when importing tax rate even when value is provided in that field.

* #615 [Added] - Add a hint of allowed extension type on Import Tax rate pop-up.

* #612 [fixed] - Layout issue on create Shipment Page.

* #611 [fixed] - Attribute field name is not displaying on product page for all attribute type except multiselect.

* #608 [fixed] - Root Category issue while root setting from channel.

* #597 [Done] - "Boolean" Attribute type issue , when we select yes then 1 is showing on front end.

* #596 [Fixed] - "Multiselect" Attribute type issue, when we select multiple option then numeric value is showing on the front end.

* #594 [Added] - Latest order should display on top and add pagination on order page.(For Customer Account).

* #592 [Added] - "Shipping to" column of Shipment remain blank if shipment for order is generated first and then invoice is created.

* #589 [Fixed] - Getting exception when product added in wishlist is deleted from admin and user try to add that product to cart from wishlist.

* #588 [Fixed] - For filter priority placeholder text should be numeric In Inventory Source grid.

* #587 [Fixed] - Layout issue in order grid of customer.

* #586 [Fixed] - Getting Exception in importing tax rates.

* #585 [Fixed] - Getting Exception when using filter according to Id in Order grid.

* #581 [Fixed] - Translation issues when switching between any two languages, specifically categories in nav does not revert back.

* #575 [Fixed] - TestDataGrid does not exist

* #560 [Fixed] - Buy Now Issue on Demo.

* #556 [Fixed] - Getting Incorrect Grandtotal and delivery charge at checkout page if currency use is other than default.

* #555 [Fixed] - Negative numbers and zero is not required in filter for Id.

* #553 [Fixed] - Showing error on wrong field while using country type field in case of required.

* #551 [Fixed] - Able to delete root category.

* #545 [Fixed] - Installer doesn't launch admin panel of framework.

* #546 [Fixed] - Getting Exception while uploading category image after installing project using installer.

* #534 [Fixed] - Product is displaying as out of stock if default Inventory is zero, while other Inventory sources have products.

* #533 [Fixed] - Displaying incorrect number of product on front-end.

## **v0.1.4(4th of Febuary, 2019)** - *Release*

* [fixed] - Customer account menu issue fixed.

* [fixed] - Channel's homepage content updated.


## **v0.1.4-BETA4(4th of Febuary, 2019)** - *Release*

* [feature] - Product flat, a product subsystem for faster product search, filter & sort on the storefront.

* [feature] - Configurations loaded up in admin panel for almost all necessary things such as payments, shipments, etc.

* [feature] - Faster and efficiently refactored datagrids for showing listing data.

* #191 [fixed] - Add a column Shipped to in Order Grid ,to display the name for whom order has been shipped.

* #368 [fixed] - If products are added in shopping cart and those product get deleted from admin section then it still displays in cart.

* #353 [fixed] - Getting exception in deleting currency.

* #143 [fixed] - If user login from checkout page, then it should redirect to checkout page.

* #402 [fixed] - Change the validation message on moving product from wish-list to cart if product added in wish-list is out of stock.

* #530 [fixed] - Unable to delete any of the created attributes.Getting validation message that attribute is used in configurable product while attribute is not used for creating any product.

* #514 [fixed] - Getting Exception on changing the status of Product(On mass update).

* #532 [fixed] - Pagination should not display if there is no product on other page.If 9 products are selected to show on a single page then until the limit reach pagination should not occur.

* #506 [fixed] - While Installing the framework through Installer if at any stage user click on back button and then click on continue to install, then in this case unable to install.

* #513 [fixed] - Getting Exception in deleting categories.

* #531 [fixed] - Do not use short form of any words for notification.

* #524 [fixed] - Getting Exception when login with user having custom role(ACL issue).

* #453 [fixed] - Installation of Master Branch.

* #426 [fixed] - php artisan down does not work.

* #396 [fixed] - Layout issue on changing locale.

* #334 [fixed] - My Account Grid displays blank after the bagisto 0.1.2 installation.

* #457 [fixed] - Admin add product "Undefined variable: configurableFamily".

* #508 [fixed] - Correct the required php version in installer.

* #519 [fixed] - Status column of Review remains blank if review is in Pending state.

* #523 [fixed] - Status column of review page remains blank if Status is change to disapprove(Mass update).

* #438 [fixed] - Simple Select Attribute Issue

* #381 [fixed] - On front-end currency symbol display only for Indian Rupee and USD. If code is selected other than these two in currency then code displays before price.

* #301 [fixed] - Only customer that are on first page get exported.

* #399 [fixed] - Accepting future date of birth for customer.

* #369 [fixed] - Displaying incorrect response message on updating the status of products.

* #363 [fixed] - Unable to delete last tax rate.

* #347 [fixed] - Pricing Issue.

* #378 [fixed] - Images that are applied on Category doesn't display in Edit Category Page.

* #304 [fixed] - If a current user want to delete his account then in this case a password verification should be required before deleting the user.

#### This changelog consists the bug & security fixes and new features being included in the releases listed below.

## **v0.1.3(19th of December, 2018)** - *Release*

* [feature] Mass selection features had been implemented in datagrid for deletion and mass updation purposes

* [feature] New filter for boolean values like active/inactive or true/false and date values native filters added in datagrid, can be seen in product grid and other data grids of admin section

* [feature] Core configuration section had been implemented so that all the sytem's core settings can be managed from a single place inside admin panel

* [critical fix] XSS vulnerability fix for datagrid thanks to anonymous user for informing

* [fixes] Optimized exception handler (thanks to @AliN11)

* #271 [fixed] Provide little space between line and text in review section(frontend)

* #165 [fixed] If a Product is selected as disabled at time of creation,then also it is visible at store front

* #187 [enhanced] We can add column "Group Name" instead of Group Id and also add this column in filter in Customers Grid

* #285 [enahanced] Add export functionality for Orders, Invoice and Shipment

* #283 [fixed] Unable to copy text from any grid

* #155 [enhanced] If a customer writes any review for product then that review is not visible in review section of customer profile until it is approved by admin

* #226 [fixed] Correct the spelling of "expensive" in Sort By

* #199 [enhanced] Add button and filter dropdown should be aligned.Changes required in every grid

* #204 [enhanced] A pop-up confirmation should display before deleting an address

* #275 [enhanced] Recent Orders, Shipment and Invoice should display first in grid

* #262 [fixed] System attributes are also getting deleted

* #260 [fixed] Layout issue in Order Status

* #269 [fixed] Weight of Product is displaying in negative

* #268 [enhanced] Newly Created Product should display first in Product Grid

* #267 [enhanced] Add Pagination for search page on frontend

* #238 [enhanced] Provide a mass selection option to approve a review

* #182 [fixed] Layout issue on Add Exchange Rate page

* #279 [fixed] If Inventory source is not selected as active then also after saving it, its status changes to Active

* #213 [fixed] View all link is not required on Rating and Review page

* #276 [fixed] Description started from centre in Categories and Tax Category

* #277 [fixed] No email and number validation in Inventory Source Grid

* #183 [enhanced] In Target Currency dropdown , currencies for which rate has already been set should not display in dropdown

* #128 [enhanced] Calender icon should also be clickable,and on click calender should display

* #272 [fixed] Getting Exception when click on Save Invoice

* #273 [fixed] Add a validation on price field that it should be numeric on Edit Product Page

* #228 [enhanced] bagisto icon should be clickable and by clicking on it, it should redirect to dashboard

* #287 [fixed] No Status for Order, in customer order grid if Order is placed using "Paypal Standard Payment" method

* #284 [fixed] Issue with price field.Accepting string also, and if space is provided between two number(5 4) than the price of product is displaying as 5 on frontend

* #264 [enhanced] Provide mass delete and mass update option in product grid

* #209 [enhanced] Add filter according to date in order grid

* #190 [fixed] Add a default group General in "Customer Group" grid and by default customer should lay in this group

* #307 [fixed] Incorrect success message after updating the News Letter Subscribers

* #306 [enhanced] Customers display randomly irrespective of their id

* #263 [enhanced] Filter for visible in menu is not working in Category grid. #263
Opened in bagisto/bagisto

* #315 [fixed] Getting exception if time taken to subscribe for newsletter increases.Add email validation in newsletter field

* #295 [fixed] Unable to change gender of customers from Edit Customer Page

* #314 [fixed] No success message after deleting the News Letter Subscribers

* #298 [enhanced] Provide an Option to delete all reviews in Review section of a customer

* #308 [fixed] Accepting the future date of birth in Customer Grid

* #305 [fixed] Displaying incorrect role name in account

* #286 [fixed] Unable to update attribute

* #278 [fixed] Images that are applied on Category doesn't display in Edit Category Page

* #324 [enhanced] Change the Button title "Create Tax Rate" to "Save Tax Rate" on Tax Rate page

* #332 [fixed] Unable to change the status of user

* #301 [fixed] Only customer that are on first page get exported

* #326 [enhanced] Only customer that are on first page get exported


## **v0.1.2(30th of November, 2018)** - *Release*

* [feature] Paypal integration for online payments

* [feature] Newsletter subscription

* [feature] Email Verification for customers

* [feature] News letter grid for Admin

* #185 - [fixed] Search not working in responsive mode

* #187 - [fixed] We can add column "Group Name" instead of Group Id and also add this column in filter in Customers Grid

* #247 - [fixed] Displaying wrong number of products and sales in category, on dashboard

* #207 - [fixed] Two button are not required to save address

* #119 - [fixed] Set value in the login form fields(on Demo)

* #245 - [fixed] Add Sales and Customers also in Custom Permission option of Access Control

* #126 - [fixed] Add asterisk symbol on SKU field

* #224 - [fixed] Status column in Invoice remains blank

* #192 - [fixed] Not able to checkout with different shipping address

* #188 - [fixed] Unable to delete Customer Group

* #151 - [fixed] Description and Short description field are throwing validation error message even if description is written

* #162 - [fixed] No response when click on "Add to Cart" for configurable product on home page and category page

* #180 - [fixed] Not accepting the code for Currency if it is already used in locales

* #121 - [fixed] buy now button is not working on index page for some products

* #134 - [fixed] Unable to login with the user account that is created in user grid with custom access

* #154 - [fixed] While creating channel Description field,Home Page Content and footer _content is required, but it doesn't throw any validation error if we leave that field blank

* #146 - [fixed] Tax is not added on product at checkout

* #161 - [fixed] Inappropriate validation message(System wide fix is applied for validation messages)

* #142 - [fixed] Correct the spelling of "default" in theme

* #165 - [fixed] If a Product is selected as disabled at time of creation,then also it is visible at store front

* #133 - [fixed] Add asterisk symbol for email field in Add User page

* #175 - [fixed] Getting exception in deleting attributes

* #165 - [feature] No grid is available in back-end to manage Newsletter

* #235 - [fixed] User name should display on account dropdown(In case of signed-in user)

* #200 - [fixed] Getting exception when applying filter on Exchange Rates grid

* #225 - [fixed] Slider button should display as clickable on mouse hover

* #148 - [fixed] Search Functionality is not working in all grid of Admin panel

* #216 - [added] Add a Column "Channel" to verify from which channel order has been placed and also add this column in filter

* #237 - [fixed] Incorrect response message after deleting product from wishlist

* #201 - [fixed] Getting exception when applying filter in slider

* #202 - [fixed] Correct the background text of filter field in Taxes grid.Text should be according to selected column(placeholder)

* #232 - [added] Add sorting functionality in column "Name" of Inventory Grid

* #230 - [added] Add Sorting functionality on column "Status" of Product Grid

* #229 - [added] Add sorting functionality on Column "Type" in Product Grid, so that product can be sorted according to type

* #244 - [fixed] Getting exception when applying sorting on Tax Rate

* #242 - [fixed] Confirmation message should be "Do you really want to edit this record?", on editing slider

* #236 - [fixed] Incorrect response message after removing a product from cart

* #206 - [fixed] Correct the confirmation message in pop-up when click on Edit User

* #174 - [fixed] Getting Exception while applying filter on category page

* #149 - [fixed] Getting exception in creating configurable product.

* #184 - [fixed] Product page mandatory fields are missing '*' or asterisk as failing to indicate required field and inappropriate validation message

* #162 - [fixed] No response when click on "Add to Cart" for configurable product on home page and category page

* #164 - [fixed] Loss of data from content field of Slider

* #166 - [fixed] Getting 404 error on deleting order

* #178 - [fixed] Change the Column Name

* #129 - [fixed] Getting issue when deleting orders.Mass action is not working in any grid(Getting Internal server error) while updating status(mass actions will return in next release and the issue will remain open till next release)

* #181 - [fixed] Change the column name in filter from "Target Currency" to "Currency Name"

* #172 - [fixed] Getting 500 Internal Server Error on updating Users

* #173 - [fixed] Getting 500 Internal Server Error on Updating taxes

* #177 - [fixed] Getting Exception when clicking on column locale

* #125 - [fixed] Delete button is not available for mass delete of Products in Product Grid(mass actions will return in next release and the issue will remain open till next release)

* #132 - [fixed] Issue in Mass Deletion.This issue exists for every grid(mass actions will return in next release and the issue will remain open till next release)

* #137 - [fixed] By default Gender is selected as Male for every customer

* #141 - [fixed] Subscribe button on storefront is unresponsive

* #145 - [fixed] Edit Functionality of Tax Categories is not Working

* #157 - [fixed] Old password check in edit profile ain't working for customers

* #120 - [fixed] After signup on the frontend, the customer is still not the signup page

* #139 - [fixed] Encountered exception while changing locale on storefront

* #144 - [fixed] "Move All Products To Cart" and "Delete All" link is not working in Wishlist grid(Move all products to cart is removed and delete all works now)

* #150 - [fixed] If currency changes on store front then on admin panel in Order Grid currency changes according to store front

* [fixes] More ACL added.


## **v0.1.1(13th of November, 2018)** - *Release*

* #94 - [fixed] Sign-in page shows signup text(@prashant-webkul)

* #95 - [fixed] Buy Now Button does not work(@prashant-webkul)

* #96 - [fixed] Search button does not work(@prashant-webkul)

* #97 - [fixed] client side validation / js validation is missing at login page

* #98 - [fixed] No warning before removing the item from the cart

* #114 - [fixed] Invoice printing added as a feature

* [fixed] Email templates logo issue fixed(@jitendra-webkul)

* [fixed] Front search issue fixed due to hardcoded attribute code in search criteria(@jitendra-webkul)

* [changed] Versioning of core packages

* [fixed] Buynow validation fixes(@jitendra-webkul)

* [feature] New action type added in datagrid

* [feature] Loader added in storefront product page

* [fixed] Tax rates and categories form fixes(@jitendra-webkul)

* [feature] Country state selector added where country and states were there originally in release v0.1.0

* [feature] Multiple addresses for customers with CRUD

* [feature] Customer can now make any of his/her existing address a default address

* [fixed] Customer address 2 form field validation required changed to optional(@jitendra-webkul)

* [fixed] Tax rates validation fixes for zip ranges(@prashant-webkul)

* [changed] Core packages composer file parameter name changed from namespace webkul to bagisto

* [feature] Payment package added in core packages

* [feature] Sales module added in admin with orders, invoices and shipments with datagrid

* [feature] Functionality to indicate the new and featured product in the product's add and edit form

* [feature] Cart actions more faster in storefront

* [changed] Responsive styles refined and extended for checkout pages on storefront

* [fixed] Various UI/UX fixes in store front styles and layouts(@prashant-webkul & @jitendra-webkul)


## **v0.1.0(30th of October 2018)** - *First release*

* [feature] Add and modify product with simple and configurable types

* [feature] Add and modify attributes and attribute families for creating products

* [feature] Datagrid for all the major core resources added as index for listing core resources like product, attributes

* [feature] Add and modify channels for creating multiple storefront

* [feature] Add and modify categories to be displayed on storefront

* [feature] Add and modify customers

* [feature] Add and modify customer groups
* [feature] Add and modify customer reviews for moderation by admin

* [feature] Add and modify currently logged in admin user details

* [feature] Add and modify locales for multiple languages support system wide

* [feature] Add and modify currencies to be used in channels

* [feature] Add and modify currency exchange rate for the stores accepting multiple currencies or using multiple channels

* [feature] Add and modify inventory sources with priority to hold products quantities in real time

* [feature] Add and modify channels

* [feature] Add and modify user from admins access with customer roles

* [feature] Add and modify customer roles for users

* [feature] Add and modify slider for storefront as a CMS capability

* [feature] Add and modify tax categories and tax rates

* [feature] Shopping cart in storefront

* [feature] Wishlist for customer

* [feature] Single address for customer

* [feature] Customer can see his reviews in his account section when logged in

* [feature] Customer profile edit feature account section when logged in

* [feature] Customer can view his orders in account section when logged in
* [feature] Customer order notifications via mails

* [feature] Multiple locales and currencies on storefront

* [feature] Locale translations are stored as a separate file in shop and admin packages

* [feature] Single page checkout system for checkout

* [feature] Custom themes and assets provisioning included as a integrated package called "theme" in packages
