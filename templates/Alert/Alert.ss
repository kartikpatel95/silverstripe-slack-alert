<% require themedCSS('assets/css/alert') %>

<% with $SiteConfig %>
    <div class="emergency-alert" style="background-color: #$AlertColor">
        <div class="py-4 container">
            $AlertMessage
        </div>
    </div>
<% end_with %>
