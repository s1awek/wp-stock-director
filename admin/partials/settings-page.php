<div class="wrap" id="stock-director-settings">
  <div class="wrap__inner" :class="{loading: loading}">
    <h1><?php echo esc_html_e('Stock Status Settings', 'stock-director'); ?></h1>
    <h2 class=""><?php echo esc_html_e('Add new range', 'stock-director'); ?></h2>
    <div class="conditions-wrap">
      <!-- Labels and fields -->
      <label for="minQuantity">
        <span><?php echo esc_html_e('Stock FROM', 'stock-director'); ?></span>
        <input type="number" class="range-input" v-model="newCondition.minQuantity" readonly>
      </label>

      <label for="maxQuantity">
        <span><?php echo esc_html_e('Stock TO', 'stock-director'); ?></span>
        <input type="number" class="range-input" v-model="newCondition.maxQuantity" id="maxQuantity">
      </label>

      <label for="message">
        <span><?php echo esc_html_e('Stock Message', 'stock-director'); ?></span>
        <input class="message-input" type="text" v-model="newCondition.message">
      </label>

      <!-- Buttons -->
      <button class="btn btn-secondary" @click="addCondition" :disabled="!isValidNewCondition">
        <?php echo esc_html_e('Add', 'stock-director'); ?>
      </button>
    </div>

    <ul class="conditions">
      <!-- Existing conditions list -->
      <li v-for="(condition, index) in conditions" :key="index" class="conditions__item">
        <div class="conditions__item-inner">
          <span class="label">From:</span><span class="value">{{ condition.minQuantity }}</span><span class="label">To:</span><span class="value">{{ condition.maxQuantity }}</span><span class="label">Stock message:</span><span class="value message">{{ condition.message }}</span>
          <button id="saveSettings" class="btn btn-secondary" @click="removeCondition(index)"><?php echo esc_html_e('Delete Range', 'stock-director'); ?></button>
        </div>
      </li>
    </ul>

    <!-- Save button -->
    <p class="info" v-if="settingsSaved"><?php echo esc_html_e('Inventory conditions updated', 'stock-director'); ?></p>
    <p class="error" v-if="settingsSaveError"><?php echo esc_html_e('Failed to save settings, please try again later', 'stock-director'); ?></p>
    <button class="btn btn-primary" :disabled="loading || !conditionsChanged" @click="saveConditions">
      <?php echo esc_html_e('Update Inventory Conditions', 'stock-director'); ?>
    </button>
  </div>
</div>