# blog
An example blog based on laravel

## 数据结构
时间：如果没有为文章选择栏目，会默认加入时间流中，这里的文章会按照标签整理
归档：选择归档后，文章会加入归档（归档分为两个级别：数据库->MySQL->事物，编程语言->C++->面向对象）

## 使用到的内容
### Baum实现无限极分类
[参考](https://laravel-china.org/topics/2124/using-baum-nested-set-model-to-achieve-unlimited-classification-laravel-model)
传统无限极分类需要使用递归方法，Laravel有一个扩展包etrepat/baum可以在保持效率的基础上实现无限极分类。

添加无限极分类后，会在migration中添加几个额外的属性：
```
$table->integer('parent_id')->nullable();
$table->integer('lft')->nullable();
$table->integer('rgt')->nullable();
$table->integer('depth')->nullable();
```