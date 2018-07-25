<!-- 1. Find Place -->
<div class="form-group">
    <div class="col-sm-12">
        <h4 class="text-left"><span class="grw-step">1</span><?php echo grp_i('Find Place'); ?></h4>
        <input type="text" class="grw-place-search form-control" value="" placeholder="Location of place (e.g. name, address)" />
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <button class="grw-search-btn btn btn-block btn-primary"><?php echo grp_i('Search Place'); ?></button>
    </div>
</div>
<!-- 2. Select Place -->
<div class="form-group">
    <div class="col-sm-12">
        <h4 class="text-left"><span class="grw-step">2</span><?php echo grp_i('Select Place'); ?></h4>
        <div class="grw-places"></div>
    </div>
</div>
<!-- 3. Save Reviews -->
<div class="form-group">
    <div class="col-sm-12">
        <h4 class="text-left"><span class="grw-step">3</span><?php echo grp_i('Save Place and Reviews'); ?></h4>
        <div class="grw-reviews"></div>
        <div class="grw-five-reviews-note" style="display:none"><?php echo grp_i('Google returns 5 reviews only'); ?></div>
        <div class="grw-save-reviews-container"></div>
    </div>
</div>