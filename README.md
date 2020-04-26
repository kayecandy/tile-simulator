# tile-simulator


## Installation notes
- This is a Wordpress plugin and can be installed by zipping this repository and adding it to Wordpress as a new plugin.
- Create a google-recaptcha.php file and put the client keys and secret there. Refer to [google-recaptcha-sample.php](google-recaptcha-sample.php).


## Folder structure
    .
    ├── includes                            # WORDPRESS CUSTOM POST-TYPES CODE
    |   |                                   # Each folder is a custom post type
    |   ├── tile-simulator-colors           
    |   ├── tile-simulator-submission       
    |   ├── tile-simulator-tile             
    |   └── tile-simulator-tile-mask
    │
    └── pages                               # FRONT-END CODE
        |
        |                                   # Page Types:
        ├── tile-simulator-2d.php           # 2D simulator page
        ├── tile-simulator-3d.php           # 3D simulator page (not being used)
        |
        |                                   # Modules:
        ├── tile-simulator-controller.php   # Contains 'Tile Selection' and 'Color Editor' panels
        └── tile-simulator-overlay.php      # Contains the Save form popup and the maximize view popup



> **Custom post-type** codes are for Wordpress custom post-type initialization and custom admin panels.
>
> * ***Tile*** - Contains information for each tile (name, description and tile-masks)
> * ***Tile Masks*** - Corresponds to an editable layer of each tile. Has a 1 to 1 relationship with *Tile* and does not have it's own admin page.
> * ***Colors*** - A custom post type for all the available/offered colors. Has one to many relationship with *Tile Masks*. Can be a color or an image (for image masks like gold or the stones)
> * ***Submissions*** - A custom post-type for user submissions. Contains the data in ``Save > Send yourself a copy!`` Form



> There are two page-types, ``tile-simulator-2d`` and ``tile-simulator-3d`` in preparation for a 3d tile simulator functionality. It's currently not being used, but system is ready for this function already.
>> **Note:** The modules are meant to be shared between page types
>
>> **Note:** The simulator page consists of 3 panels. ``tile-simulator-controller`` contains *Tile Selection* and *Color Editor* while the page-type contains *View*
