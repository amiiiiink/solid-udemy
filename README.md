## implement open-close on discount service as below

- we would like to be able to apply different type of discounts
- eg . 20%
-      50%
-      80%

$discountService = new DiscountService(new TwentyPercentDiscount)
$discountService->with($product)->apply();


php artisan make:test DiscountServiceTest --unit


# Liskov Substitution Principle (LSP)  :

"if a program is using a base class , then the reference to the base class 
can be replaced or should be replaceable with a derived class or sub class
without affecting the functionality of the program
"

"if S is subtype of T , 
then objects of type T in a program may be replaced with objects of type
S without altering any of the desirable properties of that program (e.g. correctness).
"

# Liskov Substitution Principle (LSP)  : exercise 1

- we have decided to outsource data 
- storage and will now consume our data through an api


pa make:test ProductTest

1- return type of methods cant change -- Covariance
2- parameters type of the method cant change - Contravariance
3- the exception thrown in sub class should either be the same as parent class or more specialized
