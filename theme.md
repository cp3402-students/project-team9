# Theme Development Guide
## Overview 
This document serves as a guideline designed to help new developers understand and continue development on the Team 9 WordPress theme. It provides insights into the theme's core design features, decisions, and customisation points.

## Design Decisions
Widgets were disabled during early development as there was no use for them, and it was neccessary to reduce visual clutter. Also, coincidentally, none of the early prototypes that our team produced included widgets. If you wish to re-enable them, you will need to change the .widget-area display property in './sass/components/widgets/_widgets.scss'. 

Sidebars were disabled for the same reason, and are also not utilized in the final version of the Team 9 theme. It's worth noting, one of our members suggested the use of sidebar(s) and produced a prototype image that included one, however, we decided against it, as it felt like there wasn't enough content to justify their use. If sidebars were to be included, they would mostly just be cosmetic; not actually fulfilling a functional purpose. 

The decision to implement Bootstrap was largely based on the various templates avaibliable, as well as the incredibly [comprehensive documentation](https://getbootstrap.com/docs/5.2/getting-started/introduction/) on their website. Bootstrap also offers a more modern aesthetic option than standard CSS, which was another driving factor. 

The decision to use Sass, was an experimental one. None of the team had any experience with it. However, we viewed it as natural progression and believed that integrating Sass into our workflow could potentially lead to a better final product for the client. After doing a bit of research on Sass and it's capabilities, we concluded that implementing it would likely enable us to manage and customise the theme's stylesheet(s) more effectively. This, combined with the potential to streamline our development process and simplify maintenance tasks, motivated us to take the leap and implement Sass.

## General Information
Given that the Team 9 theme uses Sass, things are slightly more complicated and confusing then they need to be. In order to make any styling related changes to the theme, you will need to navigate to the './sass' directory. Inside, there are a bunch of folders. Each folder contains (sometimes multiple) _.scss file(s), which relate to specific components within the theme. 

For example, if you wish to change something about the navigation bar, you will need to open './sass/components/navigation/_navigation.scss'. In '_navigation.scss', all of the elements which pertain to the navigation bar are referenced. Depending on which which attributes you alter within this file, you can change pretty much everything about the navigation bar. 

This process is how you will make styling to changes to the theme:

1. Find the div/element that you want to make changes to
2. Find the file that contains reference to the div/element that you are trying to change
3. Make changes required changes
4. Save file

**IMPORTANT**

Because the Team 9 theme utilizes Sass, you will need to make sure you have some sort of a compiler installed. Team 9 recommends you use the 'Live Sass Compiler' extension that is avaliable in Visual Studio Code. Once this is installed, look in the bottom right of your VS Code window and select the option 'Watch Sass'. While the compiler is 'watching...'. whenever you make a change to a _.scss file, the compiler will compile your changes and apply them to the style.css file in the ./sass directory. Without some sort of a compiler, you will be making changes and you won't ever be able to see them.

## Template Files
The following files are the files you will most likely need to make changes to when working on the theme:

**.PHP Files**
* **header.php** - This defines the top section of each page. In the Team 9 theme, it contains the site logo, navigation bar & menu, off canvas navigation bar, and any additional header elements.

* **footer.php** - This defines the bottom section of each page. In the Team 9 theme, it's quite bare. There are no widgets, social media icons, etc. The only thing present in the footer is copyright information. 

* **page.php** - This governs the presentation of static pages, determining their layout and design elements. 

* **single.php** - This controls the layout of the individual blog posts of custom post types, specifying how their content is structured and displayed. 

* **functions.php** - This controls all of the main functions used in the project. If you wish to add a custom function, it will need to be added here. 

**.SCSS Files**
* **_body.scss** -
* **_navigation.scss**

## Colours: 
As stated previously, the theme was developed for a client. The client provided all of the content for the site, including images, logos, content for courses, etc. As a result, we went with a colour scheme that closely resembled that of the original site, and complimented the site logo(s) that the client provided. 

**IMPORTANT**

This was covered in the General Information section but we will go over it again, as it's slightly different for colours. To modify colours in Sass effectively, it's essential to understand the structure of the Sass files and utilise variables for consistent and efficient colour management. Navigate to the './sass/abstracts/variables directory', where you'll find '_colours.scss'. In here, you should notice various colour variables defined using Sass syntax, such as '$primary-color', '$secondary-color', etc. Simply modify the hexadecimal values assigned to these variables to reflect your desired colour scheme. Utilising these variables ensures consistency throughout the theme and facilitates quick and easy updates across multiple stylesheets. 

## Updates
WordPress and all plugins will need to be updated as often as possible. 

## Conclusion
This concludes the Team 9 theme documentation. If you have any further questions or enquiries, please refer to the provided resources, our README.md, or reach out to beau.williams@my.jcu.edu.au