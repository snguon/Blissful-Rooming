<!-- ######################     Main Navigation   ########################## -->
<nav>
    <ol>
        <?php
        print LINE_BREAK;
        /* This sets the current page to not be a link. Repeat this if block for
         *  each menu item */
        if ($PATH_PARTS['filename'] == "index") {
            print '<li class="activePage">Home</li>';
        } else {
            print '<li><a href="index.php">Home</a></li>';
        }
        print LINE_BREAK;
        if ($PATH_PARTS['filename'] == "billing") {
            print '<li class="activePage">Billing</li>';
        } else {
            print '<li><a href="billing.php">Billing</a></li>';
        }
        print LINE_BREAK;
                if ($PATH_PARTS['filename'] == "proposal") {
            print '<li class="activePage">Proposal</li>';
        } else {
            print '<li><a href="proposal.php">Proposal</a></li>';
        }
        print LINE_BREAK;
        print '<li>Other menu options some day</li>';
        print LINE_BREAK;
        ?>
    </ol>
</nav>