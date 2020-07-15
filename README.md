# Wedding Planner Website

This is a university project done in a database course in my Bachelor studies in computer science (year 2016).

This project was done in a group of two.

The subject concerns a web site for wedding shopping. It contains:
  o Consultation of the catalogs. (Open for all visitors)
  o Selling, loaning or fitting items. (Open for only registered users)
  o Reserve music and venues. (Open for only registered users)
  o Add items, music, venues to user’s favorite list. (Open for only registered users)
  o Registration’s management.

A user can be wither admin or a client.

A client must register to have access on the website. Every client must have an id, save the groom and bride names, emails, numbers, birthdates, addresses and their wedding date. It must at least save a payment card number for one of them.

Items can have many types (clothes, shoes, accessories, makeup…) for both gender (female, male). Each item has an album containing a main photo and other images. Each item has a fixed price and a limited quantity in the stock. 

Each provider has an id, name, telephone number, email and store address. He can provide many items.

A client can buy one or many items. We must save the amount paid, quantity bought and the date.
He can pick it up or be delivered to his address.

Once an item is bought the admin must manage its status: if price paid, item packed then delivered.

The client can also loan an item for a limited time and pay a deposit calculated from the price. If the fixed return date has expired and the client has not returned the item loaned, the admin sends him two warnings.
A loan can have extra costs (laundry, or repair corrupted items…)

If the client wishes to try the items before loaning or buying he can arrange for a fitting meeting.
A client can as well reserve a venue or a music.

Each venue has many types (inside, outside ….), a type collection (romance, country, beach …). It has a max number of persons and price per hour.

We can search for venues by their locations.

Music has many types (band, singer, player, DJ, dancers…) and a type collection (romance,
country, beach …), and a fixed price per hour. For each reservation we must first check for the availability of the venue or music, save the date and number of hours and take a deposit. The client can cancel a reservation and take his deposit in a limited period, after its expiry dates if he cancels the deposit will be taken by the admin.

Each client has a favorite list, to which he can add many items, venues or music.
And finally he can rate our web site.
