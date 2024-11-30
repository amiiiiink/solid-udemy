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

# Interface Segregation Principle (ISP)

-  A Client should never be forced to depend on methods it does not use
-  Altering one method in a class should not affect classes that do not depend on it
-  Replace fat interfaces with many small , specific interfaces
