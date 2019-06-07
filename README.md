### PHP Developer test assignent

1. Create application using Symfony (version >= 4.3) and use Doctrine as ORM
2. Create entities with following schema. The fields below are required but you may add any indexes/fields that feel are necessary to complete the task:

##### VehicleType 
- code
- description
##### Make
- code

##### Model
- description
- type - should have ManyToOne relationship to VehicleType entity
- description
- type - should have ManyToOne relationship to VehicleType entity
- make code (group property in models.json) should have ManyToOne relationship to Make entity

###### SearchLog
- vehicle type
- make abbr
- number of models found in database request time
- ip address
- user agent

3. Create fixtures and load data to database from files: 
- vehicle_types.json
- makes.json
- models.json

4. Create `/` route
You will need to display an html page showing the list of vehicle types alphabetically. This list should have a link to makes route (#5).

5. Create `/makes/{type}` route. You need to display the html page with dropdown that will show a list of makes for the selected vehicle type.
If a make is selected from the dropdown list you will need send an ajax request to load the json data from model route (# 6) and display list of models underneath the makes dropdown or display message if no models are available.

6. Create `/models/{type}/{makeCode}` route to return json list of models for specific make and vehicle type.
7. You should log all request for models route to database (SearchLog entity)
8. Submit source code to us
         
