

1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
/*
 * bootstrap-tagsinput v0.8.0
 *
 */
(function ($) {
    "use strict";
    var defaultOptions = {
        tagClass: function(item) {
            return 'label label-info';
        },
        focusClass: 'focus',
        itemValue: function(item) {
            return item ? item.toString() : item;
        },
        itemText: function(item) {
            return this.itemValue(item);
        },
        itemTitle: function(item) {
            return null;
        },
        freeInput: true,
        addOnBlur: true,
        maxTags: undefined,
        maxChars: undefined,
        confirmKeys: [13, 44],
        delimiter: ',',
        delimiterRegex: null,
        cancelConfirmKeysOnEmpty: false,
        onTagExists: function(item, $tag) {
            $tag.hide().fadeIn();
        },
        trimValue: false,
        allowDuplicates: false,
        triggerChange: true
