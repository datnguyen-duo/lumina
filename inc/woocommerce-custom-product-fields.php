<?php
function custom_fields(){
    return [
        ['label' => 'Guardian 1 Name', 'name' => 'guardian_1_name'],
        ['label' => 'Guardian 1 Occupation', 'name' => 'guardian_1_occupation'],
        ['label' => 'Guardian 1 Address', 'name' => 'guardian_1_address'],
        ['label' => 'Guardian 1 City', 'name' => 'guardian_1_city'],
        ['label' => 'Guardian 1 State', 'name' => 'guardian_1_state'],
        ['label' => 'Guardian 1 Zip', 'name' => 'guardian_1_zip'],
        ['label' => 'Guardian 1 Phone', 'name' => 'guardian_1_phone'],
        ['label' => 'Guardian 1 Cell', 'name' => 'guardian_1_cell'],
        ['label' => 'Guardian 1 Email', 'name' => 'guardian_1_email'],

        ['label' => 'Guardian 2 Name', 'name' => 'guardian_2_name'],
        ['label' => 'Guardian 2 Occupation', 'name' => 'guardian_2_occupation'],
        ['label' => 'Guardian 2 Address', 'name' => 'guardian_2_address'],
        ['label' => 'Guardian 2 City', 'name' => 'guardian_2_city'],
        ['label' => 'Guardian 2 State', 'name' => 'guardian_2_state'],
        ['label' => 'Guardian 2 Zip', 'name' => 'guardian_2_zip'],
        ['label' => 'Guardian 2 Phone', 'name' => 'guardian_2_phone'],
        ['label' => 'Guardian 2 Cell', 'name' => 'guardian_2_cell'],
        ['label' => 'Guardian 2 Email', 'name' => 'guardian_2_email'],

        ['label' => 'Actor Name', 'name' => 'actor_name'],
        ['label' => 'Actor Birthday Month', 'name' => 'actor_birthday_month'],
        ['label' => 'Actor Birthday Day', 'name' => 'actor_birthday_day'],
        ['label' => 'Actor Birthday Year', 'name' => 'actor_birthday_year'],
        ['label' => 'Actor Phone', 'name' => 'actor_phone'],
        ['label' => 'Actor Cell', 'name' => 'actor_cell'],
        ['label' => 'Actor Email', 'name' => 'actor_email'],

        ['label' => 'How did you hear about us?', 'name' => 'source'],

        ['label' => 'I have read, understand and agree to abide by the Lumina Studio Theatre Policies as set forth on the Lumina Studio website', 'name' => 'privacy_and_policy_consent'],

        ['label' => 'We (actor and parent) understand that attendance at each camp day is essential', 'name' => 'parent_consent'],
    ];
}

add_action( 'woocommerce_before_add_to_cart_button', 'add_fields_before_add_to_cart' );
function add_fields_before_add_to_cart() { ?>
    <div class="custom_fields_container">
        <div class="custom_fields">
            <h2>Parent/Guardian 1</h2>

            <div class="input_holder">
                <label for="guardian_1_name">Name</label>
                <input type="text" name="guardian_1_name" id="guardian_1_name" placeholder="Name" required>
            </div>

            <div class="input_holder">
                <label for="guardian_1_occupation">Occupation</label>
                <input type="text" name="guardian_1_occupation" id="guardian_1_occupation" placeholder="Occupation">
            </div>

            <div class="two_cols">
                <div class="input_holder">
                    <label for="guardian_1_address">Address</label>
                    <input type="text" name="guardian_1_address" id="guardian_1_address" placeholder="Address(Line 1)">
                </div>

                <div class="input_holder">
                    <label for="guardian_1_apartment" class="hidden">Apartment</label>
                    <input type="text" name="guardian_1_apartment" id="guardian_1_apartment" placeholder="Apartment, suite, etc. (optional)">
                </div>
            </div>

            <div class="three_cols">
                <div class="input_holder">
                    <label for="guardian_1_city">City</label>
                    <input type="text" name="guardian_1_city" id="guardian_1_city" placeholder="City">
                </div>

                <div class="input_holder">
                    <label for="guardian_1_state">State</label>
                    <input type="text" name="guardian_1_state" id="guardian_1_state" placeholder="State">
                </div>

                <div class="input_holder">
                    <label for="guardian_1_zip">ZIP</label>
                    <input type="text" name="guardian_1_zip" id="guardian_1_zip" placeholder="ZIP Code">
                </div>
            </div>

            <div class="two_cols">
                <div class="input_holder">
                    <label for="guardian_1_phone">Phone</label>
                    <input type="text" name="guardian_1_phone" id="guardian_1_phone" placeholder="Phone">
                </div>

                <div class="input_holder">
                    <label for="guardian_1_cell">Cell</label>
                    <input type="text" name="guardian_1_cell" id="guardian_1_cell" placeholder="Cell">
                </div>
            </div>

            <div class="input_holder">
                <label for="guardian_1_email">Email</label>
                <input type="text" name="guardian_1_email" id="guardian_1_email" placeholder="Email Address">
            </div>
        </div>
    </div>

    <div class="custom_fields_container">
        <div class="custom_fields">
            <h2>Parent/Guardian 2</h2>

            <div class="input_holder">
                <label for="guardian_2_name">Name</label>
                <input type="text" name="guardian_2_name" id="guardian_2_name" placeholder="Name">
            </div>

            <div class="input_holder">
                <label for="guardian_2_occupation">Occupation</label>
                <input type="text" name="guardian_2_occupation" id="guardian_2_occupation" placeholder="Occupation">
            </div>

            <div class="two_cols">
                <div class="input_holder">
                    <label for="guardian_2_address">Address</label>
                    <input type="text" name="guardian_2_address" id="guardian_2_address" placeholder="Address(Line 1)">
                </div>

                <div class="input_holder">
                    <label for="guardian_2_apartment" class="hidden">Apartment</label>
                    <input type="text" name="guardian_2_apartment" id="guardian_2_apartment" placeholder="Apartment, suite, etc. (optional)">
                </div>
            </div>

            <div class="three_cols">
                <div class="input_holder">
                    <label for="guardian_2_city">City</label>
                    <input type="text" name="guardian_2_city" id="guardian_2_city" placeholder="City">
                </div>

                <div class="input_holder">
                    <label for="guardian_2_state">State</label>
                    <input type="text" name="guardian_2_state" id="guardian_2_state" placeholder="State">
                </div>

                <div class="input_holder">
                    <label for="guardian_2_zip">ZIP</label>
                    <input type="text" name="guardian_2_zip" id="guardian_2_zip" placeholder="ZIP Code">
                </div>
            </div>

            <div class="two_cols">
                <div class="input_holder">
                    <label for="guardian_2_phone">Phone</label>
                    <input type="text" name="guardian_2_phone" id="guardian_2_phone" placeholder="Phone">
                </div>

                <div class="input_holder">
                    <label for="guardian_2_cell" class="hidden">Cell</label>
                    <input type="text" name="guardian_2_cell" id="guardian_2_cell" placeholder="Cell">
                </div>
            </div>

            <div class="input_holder">
                <label for="guardian_2_email">Email</label>
                <input type="text" name="guardian_2_email" id="guardian_2_email" placeholder="Email Address">
            </div>
        </div>
    </div>

    <div class="custom_fields_container">
        <div class="custom_fields">
            <h2>Actor</h2>

            <div class="input_holder">
                <label for="actor_name">Name</label>
                <input type="text" name="actor_name" id="actor_name" placeholder="First and Last Name">
            </div>

            <div class="three_cols">
                <div class="input_holder">
                    <label for="actor_birthday_month">Birthday</label>
                    <input type="number" name="actor_birthday_month" id="actor_birthday_month" placeholder="Month">
                </div>

                <div class="input_holder">
                    <label for="actor_birthday_day" class="hidden">Day</label>
                    <input type="number" name="actor_birthday_day" id="actor_birthday_day" placeholder="Day">
                </div>

                <div class="input_holder">
                    <label for="actor_birthday_year" class="hidden">Year</label>
                    <input type="number" name="actor_birthday_year" id="actor_birthday_year" placeholder="Year">
                </div>
            </div>

            <div class="two_cols">
                <div class="input_holder">
                    <label for="actor_phone">Phone</label>
                    <input type="text" name="actor_phone" id="actor_phone" placeholder="Phone">
                </div>

                <div class="input_holder">
                    <label for="actor_cell" class="hidden">Cell</label>
                    <input type="text" name="actor_cell" id="actor_cell" placeholder="Cell">
                </div>
            </div>

            <div class="input_holder">
                <label for="actor_email">Email</label>
                <input type="text" name="actor_email" id="actor_email" placeholder="Email Address">
            </div>
        </div>
    </div>

    <div class="custom_fields_container actor">
        <div class="custom_fields">
            <h2>How did you hear about Lumina?</h2>

            <div class="pills_checkbox_inputs_holder">
                <label for="source_friend" class="container">
                    <input type="radio" id="source_friend" name="source_copy" value="Friend" required>
                    <span class="checkmark">Friend</span>
                </label>

                <label for="source_family" class="container">
                    <input type="radio" id="source_family" name="source_copy" value="Family">
                    <span class="checkmark">Family</span>
                </label>

                <label for="source_attended_a_show" class="container">
                    <input type="radio" id="source_attended_a_show" name="source_copy" value="Attended a Show">
                    <span class="checkmark">Attended a Show</span>
                </label>

                <label for="source_school" class="container">
                    <input type="radio" id="source_school" name="source_copy" value="School">
                    <span class="checkmark">School</span>
                </label>

                <label for="source_newspaper" class="container">
                    <input type="radio" id="source_newspaper" name="source_copy" value="Newspaper">
                    <span class="checkmark">Newspaper</span>
                </label>

                <label for="source_other" class="container">
                    <input type="radio" id="source_other" name="source_copy" value="Other">
                    <span class="checkmark">Other</span>
                </label>

                <input type="hidden" name="source">
            </div>

            <div class="caution">
                <p>A non-refundable deposit of $150 is required with all registrations.</p>

                <div class="checkbox_inputs_holder">
                    <label for="privacy_and_policy_consent" class="container">
                        I have read, understand and agree to abide by the Lumina Studio Theatre Policies as set forth on the Lumina Studio website.
                        <input type="checkbox" id="privacy_and_policy_consent" name="privacy_and_policy_consent" value="Yes" required>
                        <span class="checkmark"></span>
                    </label>

                    <label for="parent_consent" class="container">
                        We (actor and parent) understand that attendance at each camp day is essential.
                        <input type="checkbox" id="parent_consent" name="parent_consent" value="Yes" required>
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
<?php }

/**
 * Add data to cart item
 */
add_filter( 'woocommerce_add_cart_item_data', 'add_cart_item_data', 25, 2 );

function add_cart_item_data( $cart_item_meta, $product_id ) {
    $fields = custom_fields();

    $custom_data = array();

    foreach( $fields as $field ):
        //$custom_data[$field['name']] = isset($_POST[$field['name']]) ? sanitize_text_field($_POST[$field['name']]) : "" ;
        $custom_data[$field['name']] = $_POST[$field['name']] ? sanitize_text_field($_POST[$field['name']]) : "-" ;
    endforeach;


    $cart_item_meta['custom_data'] = $custom_data ;

    return $cart_item_meta;
}

/**
 * Display the custom data on cart and checkout page
 */
add_filter( 'woocommerce_get_item_data', 'get_item_data' , 25, 2 );

function get_item_data($other_data, $cart_item) {
    $fields = custom_fields();

    if ( isset($cart_item['custom_data']) ) {
        $custom_data = $cart_item['custom_data'];

        foreach( $fields as $field ):
            $other_data[] = array('name' => $field['label'], 'display' => $custom_data[$field['name']]);
        endforeach;
    }

    return $other_data;
}

/**
 * Add order item meta
 */
add_action( 'woocommerce_add_order_item_meta', 'add_order_item_meta' , 10, 2);

function add_order_item_meta ( $item_id, $values ) {
    $fields = custom_fields();

    if ( isset($values['custom_data']) ) {
        $custom_data = $values['custom_data'];

        foreach( $fields as $field ):
            wc_add_order_item_meta( $item_id, $field['label'], $custom_data[$field['name']] );
        endforeach;
    }
}