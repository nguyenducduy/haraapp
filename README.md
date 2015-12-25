# Phalcon Kit

## Remember
When CSRF token return false, check img not found in this page.
## Requirements

## Engine

## Multilanguage 
Using Additional Translation Table Approach.
[More info](http://www.apphp.com/tutorials/index.php?page=multilanguage-database-design-in-mysql#additional_translation_table_approach)

## Injector
* Slug
    - Matching all regex url and query db to set system router.

## Module
* User
 	- Admin: CRUD, Upload avatar.

* Auth
    - Admin: Login, Reset password.
    - Site: Register, Login, Forgot password, Change password.

* HybirdAuth
    - Admin: Add and Listing records logged in with third party system like Facebook, Google.
    - Site: Login with Facebook, Google.

* Slugs
    - Admin: List, Edit, Delete generated slug.

=====

* Classifieds Category (/classifieds)
    - Admin: CRUD, Change order, Upload icon, CRUD fieldsets.
    - Site: Listing.

* Classifieds Fields
    - Admin: CRUD.
    - Site: Select fields to choose from classifieds ads.

=====

* Blog Category (/blog)
    - Admin: CRUD, Change order, Upload icon, CRUD fieldsets.
    - Site: Listing.
* Blog Article
    - Admin: Edit, Delete.
    - Site: Create, Upload cover, Content image upload via text editor.
* Blog Comments
    - Admin: Edit, Delete.
    - Site: Create.