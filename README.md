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

# Liskov Substitution Principle (LSP)  : exercise 2

The Liskov Substitution Principle (LSP) states that objects of a subclass should be able to replace objects of a superclass without affecting the correctness of the program. In other words, if a class S is a subclass of class T, you should be able to use S wherever you use T.

In the code provided, let's examine how LSP applies:

    The Mechanic class has a fix() method that takes a Fixable interface as a parameter.
    Vehicle implements Fixable, and Car and Mercedes both extend Vehicle, meaning Car and Mercedes are also Fixable by inheritance.
    In the code, you create an instance of Mercedes (a subclass of Vehicle) and pass it to Mechanic::fix(), which accepts any Fixable object as an argument.

Does Liskov Substitution Apply Here?

Yes, LSP is executed here because:

    Mercedes (a subclass of Vehicle) can replace Vehicle in Mechanic::fix() without any issues.
    Since Mercedes inherits all properties and methods of Vehicle, it satisfies the Fixable interface, allowing it to be used interchangeably where a Vehicle (or any Fixable object) is expected.

Why It Works

When you pass $mercedes to $mechanic->fix(), it behaves correctly as if it were a Vehicle (or any Fixable object), fulfilling LSP by allowing the subclass (Mercedes) to substitute for the superclass (Vehicle).
Potential Issue

If you uncomment echo $mechanic->fix($vehicle);, it would work, but if Vehicle were modified in the future (e.g., by making it abstract), only Car and Mercedes should directly instantiate fixable vehicles, aligning even more with the intent of LSP.

