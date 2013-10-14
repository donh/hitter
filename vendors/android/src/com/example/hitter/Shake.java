package com.example.hitter;
// http://blog.csdn.net/kent_todo/article/details/11844231
import android.app.Activity;
import android.hardware.Sensor;
import android.hardware.SensorEvent;
import android.hardware.SensorEventListener;
import android.hardware.SensorManager;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.os.Vibrator;
import android.util.Log;
import android.widget.Toast;

public class Shake extends Activity {
    private SensorManager sensorManager;
    private Vibrator vibrator;
    private static final String TAG = "Shake";
    private static final int SENSOR_SHAKE = 10;
    /**
     * Called when the activity is first created.
     */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        sensorManager = (SensorManager) getSystemService(SENSOR_SERVICE);
        vibrator = (Vibrator) getSystemService(VIBRATOR_SERVICE);
    }
    @Override
    protected void onResume() {
        super.onResume();
        if (sensorManager != null) {// 註冊監聽器
            sensorManager.registerListener(sensorEventListener, sensorManager.getDefaultSensor(Sensor.TYPE_ACCELEROMETER), SensorManager.SENSOR_DELAY_NORMAL);
            // 第一個參數是Listener，第二個參數是所得傳感器類型，第三個參數值獲取傳感器信息的頻率
        }
    }
    @Override
    protected void onPause() {
        super.onPause();
        if (sensorManager != null) {// 取消監聽器
            sensorManager.unregisterListener(sensorEventListener);
        }
    }

    /**
     * 重力感應監聽
     */
    private SensorEventListener sensorEventListener = new SensorEventListener() {
        @Override
        public void onSensorChanged(SensorEvent event) {
            // 傳感器信息改變時執行該方法
            float[] values = event.values;
            float x = values[0]; // x軸方向的重力加速度，向右為正
            float y = values[1]; // y軸方向的重力加速度，向前為正
            float z = values[2]; // z軸方向的重力加速度，向上為正
            Log.i(TAG, "x軸方向的重力加速度" + x + "；y軸方向的重力加速度" + y + "；z軸方向的重力加速度" + z);
            // 一般在這三個方向的重力加速度達到40就達到了搖晃手機的狀態。
            int medumValue = 19;// 三星 i9250怎麼晃都不會超過20，沒辦法，只設置19了
            if (Math.abs(x) > medumValue || Math.abs(y) > medumValue || Math.abs(z) > medumValue) {
                vibrator.vibrate(200);
                Message msg = new Message();
                msg.what = SENSOR_SHAKE;
                handler.sendMessage(msg);
            }
        }
        @Override
        public void onAccuracyChanged(Sensor sensor, int accuracy) {
        }
    };

    /**
     * 動作執行
     */
    Handler handler = new Handler() {
        @Override
        public void handleMessage(Message msg) {
            super.handleMessage(msg);
            switch (msg.what) {
                case SENSOR_SHAKE:
                    Toast.makeText(Shake.this, "檢測到搖晃，執行操作！", Toast.LENGTH_SHORT).show();
                    Log.i(TAG, "檢測到搖晃，執行操作！");
                    break;
            }
        }
    };
}
