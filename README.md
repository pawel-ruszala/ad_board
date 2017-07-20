# Simply Ad Board
***
## Welcome !
That is my first application created in **Symfony**.
This is a simply Ad Board.

At this page you can:
* add advertisments with infromations about the products you want to sell
* find advertisments with products that someone wants to sell
***
### Contain of advert:
  * The product
  * Description of the product
  * Images
  * Contact email
  * Condition of product
  * Price
  * Category
***
### What I have done
* Used FOS User Bundle
* Image validation by mimeType/image
* Generate directory for images: date/username/uniqe-fileOrginalName
* Created asserts
* Showing lasts 3 adverts on main page
* Sort adverts by date
* Connect with database
* Basic template
* Add pictures form
* Permissions for logged and not logged user
* Edit advert
* Add searching:
** by phrase
** by user
** by category
* User Profile
* Edit username, mail
* Opinions about users - add, show
* Colors for opinions (negative - red, positive -green, neutral - blue)
* You can edit only yours adverts
* If title is longer than 50, cut the text and add "..."
* Expired time auto set to 30 days
***

### To do list
* Category update
* Hide advert after expired time
* Update categories
* Admin panel

### Pictures
![alt text][main]
![alt text][register]
![alt text][opinions]
![alt text][search]
![alt text][advert]

[main]: https://raw.githubusercontent.com/pawel-ruszala/ad_board/master/web/images/readme/main_page.png "main page"
[register]: https://raw.githubusercontent.com/pawel-ruszala/ad_board/master/web/images/readme/register.png "register"
[opinions]: https://raw.githubusercontent.com/pawel-ruszala/ad_board/master/web/images/readme/opinions.png "opinions"
[search]: https://raw.githubusercontent.com/pawel-ruszala/ad_board/master/web/images/readme/search.png "search"
[advert]: https://raw.githubusercontent.com/pawel-ruszala/ad_board/master/web/images/readme/advert.png "advert"