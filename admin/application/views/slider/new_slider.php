<div  class='form_content'>
    <form id="valid_form" action='<?=site_url('slider/new_slider')?>' enctype="multipart/form-data" method='post'>
        <table>
            <tr>
                <th>Title <span class='req_mark'>*</span></th>
                <td><input type='text' name='title' value='<?=set_value('title')?>' class='text ui-widget-content ui-corner-all required width_200' /><?= form_error('title', '<span>', '</span>') ?></td>
            </tr>
           
            <tr>
                <th>Image <span class='req_mark'>*</span></th>
                <td><input type='file' name='image' class='required' />[Note:Width X Height=882 X 320]</td>
            </tr>
            <tr>
                <th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
        </table>
    </form>
</div>