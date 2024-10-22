## implement open-close on discount service as below

- we would like to be able to apply different type of discounts
- eg . 20%
-      50%
-      80%

$discountService = new DiscountService(new TwentyPercentDiscount)
$discountService->with($product)->apply();
