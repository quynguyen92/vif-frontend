<table class="wp-list-table widefat striped customer-nav">
    <thead>
    <tr>
        <th>Nhà đầu tư</th>
        <th>Số CCQ cuối kỳ</th>
        <th>Giá cuối kỳ</th>
        <th>Vốn cuối kỳ</th>
        <th>Giá thị trường</th>
        <th>Tài sản ròng</th>
        <th>Tăng trưởng</th>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($data) && !empty($data)) : ?>
        <?php
        $totalCCQAfter = $data->amountCCQAfter * $data->priceCCQAfter;
        $totalCCQMarket = $data->amountCCQAfter * $data->priceCCQMarket;
        $rate = $totalCCQAfter ? (($totalCCQMarket - $totalCCQAfter) / $totalCCQAfter) : 0;
        ?>
    <tr>
        <td><?php echo isset($currentUser) ? $currentUser->display_name : ''; ?></td>
        <td><?php echo number_format($data->amountCCQAfter, 2); ?></td>
        <td><?php echo number_format($data->priceCCQAfter, 2); ?></td>
        <td><?php echo number_format($totalCCQAfter, 2); ?></td>
        <td><?php echo number_format($data->priceCCQMarket, 2); ?></td>
        <td><?php echo number_format($totalCCQMarket, 2); ?></td>
        <td class="<?php echo $rate > 0 ? 'increase' : 'decrease' ?>"><?php echo number_format($rate * 100, 2) . '%'; ?></td>
    </tr>
    <?php else : ?>
    <tr>
        <td align="center" colspan="10">Không có thông tin nào để hiển thị.</td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>
<style>
    .customer-nav thead th {
        font-weight: bold;
    }

    .customer-nav .increase {
        color: #25b100;
    }

    .customer-nav .decrease {
        color: #cb011b;
    }
</style>