<?php

return [
    'inputContainer'    => '<div class="form-group row {{required}}">{{content}}</div>',
    'label'             => '<label class="col-sm-2 col-form-label" {{attrs}}>{{text}}</label>',
    'input'             => '<div class="col-sm-10">
                                <input type="{{type}}" name="{{name}}" class="form-control" {{attrs}} {{required}}>
                            </div>',
    'button'            => '<button class="btn btn-primary" {{attrs}}>{{text}}</button>',
    'inputContainerError' => '<div class="invalid-feedback {{type}}{{required}} error">{{content}}{{error}}</div>'
];

?>