<% with $SiteConfig %>
    <div class="emergency-alert fixed-top warning-box collapse show" style="background-color: #$AlertColor">
        <div class="py-4 container">
            <div class="alert-close">
                <span class="py-1 dismiss-alert" data-toggle="collapse" data-target=".warning-box">Close</span>
            </div>
            <% if $AlertMessage %>
                $AlertMessage
            <% end_if %>
        </div>
    </div>
<% end_with %>
