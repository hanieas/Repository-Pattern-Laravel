# Repository-Pattern-Laravel
A repository is a separation between a domain and a persistent layer. The repository provides a collection interface to access data stored in a database, file system or external service. Data is returned in the form of objects.

  
![alt text](https://miro.medium.com/max/792/1*UkamU_aPVk8U1w46Lr_dHg.png)

The main idea to use Repository Pattern in a Laravel application is to create a bridge between models and controllers.

## Benefits

- [x] Reduces duplication of code
- [x] A lower chance for making programming errors
- [x] Centralization of the data access logic makes code easier to maintain
- [x] Business and data access logic can be tested separately
