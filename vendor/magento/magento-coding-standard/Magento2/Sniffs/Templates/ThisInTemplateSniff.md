# Rule: Do not use `$this` in templates
## Background
In PHTML templates, the current block is available as `$this` and `$block`. The alternative with `$this` has been deprecated and should not be used anymore.

## Reasoning
`$this` in templates is a legacy from Magento 1. It still works, however this can change any time, should templates and blocks be further decoupled. That's why for new code you should always use `$block` and restrict it to public methods.

## How it works
Any occurrence of `$this` in PHTML files (via file pattern in ruleset.xml) raises a warning. 

## How to fix

Replace `$this` with `$block`. If you use private or protected methods, make them public.

---

# Rule: Do not use `helpers` in templates
## Background
The use of helpers is in general discouraged. For template files, consider using a ViewModel instead.

## Reasoning
The use of helpers is in general discouraged therefore any `$this->helper(<helper_class>)` code used in PHTML templates should be refactored.

Consider using ViewModel instead.

## How to fix

Typical example of a helper being used in a PHTML:
```html
<?php $_incl = $this->helper(<helper_class>)->...; ?>
```

Once the ViewModel is created, call it in the PHTML as follow:

```html
<?php $viewModel = $block->getViewModel(); ?>
```
or
```html
<?php $viewModel = $block->getData('viewModel'); ?>
```
