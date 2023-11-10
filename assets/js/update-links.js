// This code will receive PHP variables through the 'rotatorVars' object
document.addEventListener('DOMContentLoaded', function() {
    var rotationElements = document.querySelectorAll('.' + rotatorVars.rotationClass);
    if (rotationElements.length > 0) {
        rotationElements.forEach(function(element) {
            element.href = rotatorVars.randomUrl;
        });
    }
});
